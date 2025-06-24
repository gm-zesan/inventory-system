<script>
    function calculateTotals() {
        let subtotal = 0;
        $('#sale-items tbody tr').each(function() {
            const price = parseFloat($(this).find('.price').val()) || 0;
            const qty = parseFloat($(this).find('.qty').val()) || 0;
            const total = price * qty;
            $(this).find('.total').val(total);
            subtotal += total;
        });

        $('#subtotal').val(subtotal);
        const discount = parseFloat($('#discount').val()) || 0;
        const afterDiscount = subtotal - discount;
        const vat = afterDiscount * 0.05;
        const total = afterDiscount + vat;
        const paid = parseFloat($('#paid').val()) || 0;
        const due = total - paid;

        $('#vat').val(vat.toFixed(2));
        $('#total').val(total.toFixed(2));
        $('#due').val(due.toFixed(2));
    }

    $(document).on('change keyup', '.product-select, .qty, #discount, #paid', function() {
        $('#sale-items tbody tr').each(function() {
            const selected = $(this).find('.product-select option:selected');
            const price = selected.data('price') || 0;
            $(this).find('.price').val(price);
        });
        calculateTotals();
    });

    $('#add-row').click(function() {
        const row = `<tr>
            <td>
                <select name="products[]" class="form-control custom-input product-select">
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->sell_price }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" class="form-control custom-input price" name="prices[]" readonly></td>
            <td><input type="number" class="form-control custom-input qty" name="quantities[]" min="1" value="1"></td>
            <td><input type="number" class="form-control custom-input total" name="totals[]" readonly></td>
            <td><button type="button" class="btn btn-sm btn-danger remove-row"><i class="ri-delete-bin-2-line"></i></button></td>
        </tr>`;
        $('#sale-items tbody').append(row);
    });

    $(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        calculateTotals();
    });

    $('.submit-button').click(function(){
        let isValid = true;
        $('.product-select, .qty, #discount, #paid').removeClass('is-invalid');
        $('.error-message').remove();

        // Validate product and quantity
        $('#sale-items tbody tr').each(function() {
            const product = $(this).find('.product-select').val();
            const qty = parseFloat($(this).find('.qty').val());

            if (!product) {
                isValid = false;
                const selectBox = $(this).find('.product-select');
                selectBox.addClass('is-invalid');
                selectBox.after('<div class="error-message" style="color:red; font-size:13px;">Please select a product</div>');
            }

            if (!qty || qty <= 0) {
                isValid = false;
                const qtyInput = $(this).find('.qty');
                qtyInput.addClass('is-invalid');
                qtyInput.after('<div class="error-message" style="color:red; font-size:13px;">Quantity must be greater than 0</div>');
            }
        });

        // Discount validation
        const discount = parseFloat($('#discount').val());
        if (isNaN(discount) || discount < 0) {
            isValid = false;
            $('#discount').addClass('is-invalid');
            $('#discount').after('<div class="error-message" style="color:red; font-size:13px;">Discount cannot be negative</div>');
        }

        // Paid validation
        const paid = parseFloat($('#paid').val());
        if (isNaN(paid) || paid < 0) {
            isValid = false;
            $('#paid').addClass('is-invalid');
            $('#paid').after('<div class="error-message" style="color:red; font-size:13px;">Paid amount cannot be negative</div>');
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }

        $(this).css('opacity', '1');
        $(this).find('.spinner-border').removeClass('d-none');
        $(this).attr('disabled', true);
        $(this).closest('form').submit();
    });

    // Remove error on input change
    $(document).on('change keyup', '.product-select, .qty, #discount, #paid', function() {
        if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $(this).next('.error-message').remove();
        }
    });

    // Initial calculation on page load
    $(document).ready(function() {
        $('#sale-items tbody tr').each(function() {
            const selected = $(this).find('.product-select option:selected');
            const price = selected.data('price') || 0;
            $(this).find('.price').val(price);
        });
        calculateTotals();
    });
</script>