<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'phone', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /** @var list<int>|null */
    private ?array $wishlistIdsMemo = null;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /** Strips spaces, dashes and the +88 / 88 prefix so 01XXXXXXXXX is the one stored form. */
    public static function normalizePhone(?string $phone): string
    {
        $phone = preg_replace('/[\s\-]+/', '', (string) $phone);

        return (string) preg_replace('/^(\+?88)(?=01)/', '', $phone);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /** Every order of this customer: the ones linked to the account plus any placed with the same mobile number. */
    public function customerOrders(): Builder
    {
        return Order::query()->where(function (Builder $query) {
            $query->where('user_id', $this->id);

            if ($this->phone) {
                $query->orWhere('phone', $this->phone);
            }
        });
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class)->orderByDesc('is_default')->orderBy('id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /** @return list<int> */
    public function wishlistProductIds(): array
    {
        return $this->wishlistIdsMemo ??= $this->wishlists()->pluck('product_id')->map(fn ($id) => (int) $id)->all();
    }
}
