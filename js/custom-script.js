$(function() { 

    // validate step1 inputs
    $("#step1-form").validate({

        rules: {
            firstname_input: "required",
            lastname_input: "required",
            company_input: "required",
            telephone_input: {
                required: true,
                number: true
            },
            email_input: {
                required: true,
                email: true
            }
        },
        messages: {
            firstname_input: "Enter Firstname",
            lastname_input: "Enter Lastname",
            company_input: "Enter company details",
            telephone_input: "Enter valid telephone number",
            email_addr: "Enter valid email address"
        },
        submitHandler: function(form) {
            form.submit();
        }

    });

    // validate step3 inputs
    $("#confirm-form").validate({

        rules: {
            agreecheck: {
                required: true
            },
            signature: "required"
        },
        messages: {
            agreecheck: {
                required: "Please agree our conditions"
            },
            signature: "Enter your digital signature"
        },
        submitHandler: function(form) {
            form.submit();
        }
        
    });

    // invoke multiple select
    $(".chosen-select").chosen();

    // allow validator to select hidden select box
    $.validator.setDefaults({ ignore: ":hidden:not(select)" })
    $("#step2-form").validate({

        rules: {
            fx_range: "required",
            business_addr1: "required",
            business_addr2: "required",
            postcode_input: "required",
            select_country: "required",
            trading_postcode_input: "required",
            trading_addr1: "required",
            trading_addr2: "required"
        },
        messages: {
            fx_range: "Please choose an option",
            business_addr1: "Address Line 1",
            business_addr2: "Address Line 2",
            postcode_input: "Enter valid postcode",
            select_country: "Choose at least one country",
            trading_postcode_input: "Enter valid postcode",
            trading_addr1: "Address Line 1",
            trading_addr2: "Address Line 2"
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
    
    /* Validate Telephone number Input (Numbers Only) */
    $("#telephone_input").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#same_as_registered").on("change", function(){
        if (!this.checked) {
            $('#trading-addr').show();
            $("[name='trading_postcode_input']").val('');
            $("[name='trading_addr1']").val('');
            $("[name='trading_addr2']").val('');
            $("[name='trading_addr3']").val('');
        }
        else {
            $("[name='select_trading_country']").val($("[name='select_country']").val());
            $("[name='trading_postcode_input']").val($("[name='postcode_input']").val());
            $("[name='trading_postcode_results']").val($("[name='postcode-results']").val());
            $("[name='trading_addr1']").val($("[name='business_addr1']").val());
            $("[name='trading_addr2']").val($("[name='business_addr2']").val());
            $("[name='trading_addr3']").val($("[name='business_addr3']").val());
            $('#trading-addr').hide();
        }
    });

    if ($('input[type="checkbox"][name="agree"]').prop("checked")) {
        $('#postcode_input').change(function() {
            $('#trading_postcode_input').attr("value", $(this).val());
        });
        $('#business_addr1').change(function() {
            $('#trading_addr1').attr("value", $(this).val());
        });
        $('#business_addr2').change(function() {
            $('#trading_addr2').attr("value", $(this).val());
        });
        $('#business_addr3').change(function() {
            $('#trading_addr3').attr("value", $(this).val());
        });
        $('#trading-addr').hide();
    }

});