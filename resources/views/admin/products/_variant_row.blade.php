<tr>
    <td>
        <input type="hidden" name="variants[{{ $i }}][id]" value="{{ $row['id'] ?? '' }}">
        <input class="input" name="variants[{{ $i }}][size]" value="{{ $row['size'] ?? '' }}" placeholder="M" style="min-width:5rem">
    </td>
    <td><input class="input" name="variants[{{ $i }}][color]" value="{{ $row['color'] ?? '' }}" placeholder="Navy" style="min-width:6rem"></td>
    <td><input class="input" name="variants[{{ $i }}][sku]" value="{{ $row['sku'] ?? '' }}" placeholder="optional" style="min-width:7rem"></td>
    <td><input class="input" type="number" step="0.01" min="0" name="variants[{{ $i }}][price]" value="{{ $row['price'] ?? '' }}" placeholder="same as base" style="min-width:7rem"></td>
    <td><input class="input" type="number" min="0" name="variants[{{ $i }}][stock]" value="{{ $row['stock'] ?? 0 }}" style="min-width:5rem"></td>
    <td><button type="button" class="icon-btn danger" data-remove-variant title="Remove"><svg class="ic"><use href="#i-trash" /></svg></button></td>
</tr>
