$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#modele-id').on('change', function () {
        var modeleId = $(this).val();
        if (modeleId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'modele_id=' + modeleId,
                success: function (colors) {
                    $select = $('#color-id');
                    $select.find('option').remove();
                    $.each(colors, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.color + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#color-id').html('<option value="">Select color first</option>');
        }
    });
});


