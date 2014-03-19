/**
Custom module for you to write your own javascript functions
**/
var Custom = function () {

    // private functions & variables

    var myFunc = function(text) {
        alert(text);
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.
            Custom.initSliders();
            Custom.initSelects();
            Custom.initFicheTab();
            Custom.initImageShow();
            Custom.initConfigurationsSelection();
            // Custom.filterSearchFormAjaxify();
            // Custom.statechange();
            $('.form-group select.form-control').on("change", function(){
                $('.horizontal-form form').submit();
            });

            $(document).ajaxStart(function () {
                $('#catalog_wrapper')
                    .addClass('overlay')
                    .prepend('<i class="fa fa-spinner"></i>');
            }).ajaxStop(function () {
                $('#catalog_wrapper').removeClass('overlay');
                $('.fa.fa-spinner').remove();
            });
        },

        initSliders: function() {
            $('#amount').ionRangeSlider({
                type: 'double',
                step: 1000,
                postfix: " &euro;",
                hasGrid: true,
                onChange: function() {
                    var amountText = $.trim($('#irs-1 .irs-to').text());
                    if ( amountText == '40 000 €') {
                        $('#irs-1 .irs-to').text('40 000 € +');
                    }
                },
                onFinish: function() {
                    var val = $('#amount').val();
                    val = val.split(';');
                    var min = val[0];
                    var max = val[1];
                    $('#search_minPrice').val(min);
                    $('#search_maxPrice').val(max);
                    $('.horizontal-form form').trigger('form.submit');
                }
            });
            $('#km').ionRangeSlider({
                type: 'double',
                step: 5000,
                postfix: " KM",
                hasGrid: true,
                onChange: function() {
                    var kmText = $.trim($('#irs-2 .irs-to').text());
                    if ( kmText == '100 000 KM') {
                        $('#irs-2 .irs-to').text('100 000 KM +');
                    }
                },
                onFinish: function() {
                    var val = $('#km').val();
                    val = val.split(';');
                    var min = val[0];
                    var max = val[1];
                    $('#search_minKm').val(min);
                    $('#search_maxKm').val(max);
                    $('.horizontal-form form').trigger('form.submit');
                }
            });

            $('#irs-1 .irs-max').text('40 000 € +');
            $('#irs-2 .irs-max').text('100 000 KM +');
        },

        initSelects: function() {
            $('.form-group select#search_modeles').select2({
                placeholder: "Choisir un modèle"
            });
            $('.form-group select#search_marques').select2({
                placeholder: "Choisir une marque"
            });
            $('.form-group select#search_categories').select2({
                placeholder: "Choisir une catégorie"
            });
            $('.form-group select#search_boitevitesses').select2({
                placeholder: "Choisir une boite de vitesses"
            });
            $('.form-group select#search_energies').select2({
                placeholder: "Choisir une énergie"
            });
            $('#search_marques').on('select2-removing', function(e) {
                var modeles = $('#search_modeles').val();
                if(modeles != null) {
                    var modelesToKeep = [];
                    for(i = 0, length = modeles.length;i<length;i++) {
                        var marque = modeles[i].split('|').shift();
                        if(e.val != marque) {
                            modelesToKeep.push(modeles[i]);
                        }
                    }
                    $("#search_modeles").select2("val", modelesToKeep);
                }
            });
            $('#search_modeles').on('select2-selecting', function(e) {
                if($('#search_marques').val() === null) {
                    var marque = e.val.split('|').shift();
                    $("#search_marques").select2("val", marque);
                }
            });
            $('.form-group select.form-control').on("change", function(e){
                $('.horizontal-form form').trigger('form.submit');
            });
        },

        initFicheTab: function() {
            $('.tabbable-custom-profile .nav-tabs li').on('click', function() {
                $('.tabbable-custom-profile .nav-tabs li').removeClass('active');
                $('.tabbable-custom-profile .tab-pane').removeClass('active');
                $(this).addClass('active');

                var href = $(this).children('a').attr('href');
                $('.tabbable-custom-profile .tab-pane').each( function() {
                    if(href === $(this).attr('id')) {
                        $(this).addClass('active');
                    }
                });
            });

            $('.tabbable-custom > .nav li').on('click', function() {
                $('.tabbable-custom > .nav li').removeClass('active');
                $('.tabbable-custom .profile > .tab-pane').removeClass('active');
                $(this).addClass('active');

                var href = $(this).children('a').attr('href');
                $('.tabbable-custom .profile > .tab-pane').each( function() {
                    if(href === $(this).attr('id')) {
                        $(this).addClass('active');
                    }
                });

            });
        },

        initConfigurationsSelection: function() {
            $('.profile-info table .radio span').first().addClass('checked');
            $('.profile-info table .radio span input').on("click", function() {
                var id = $(this).attr('data-id');
                $('.portlet .text-center .dossier').text(id);
            });
        },

        initImageShow: function() {
            $('.tab-pane .thumbs .img-responsive').on('hover', function() {
                $('.tab-pane .image img').attr('src', $(this).attr('src'));
            });
        },

        filterSearchFormAjaxify: function() {
            $('.horizontal-form form').on('submit', function(e) {
                e.preventDefault();
                var History = window.History;
                if ( !History.enabled ) {
                    return true;
                }
                $form = $('.horizontal-form form').serializeArray();
                if (typeof History.pushState == 'function') {
                    var path = baseUrl+'/catalogues/?';
                    var pathTitle = 'Tous les catalogues';
                    if ($('.lte-ie9').length > 0) { //Idem pour IE10
                        History.pushState($form, pathTitle, path+$.param($form));
                    } else {
                        History.pushState($form, pathTitle, decodeURIComponent(path+$.param($form)));
                    }
                }
            });

            return false;
        },

        statechange: function() {
        $(window).bind('statechange',function(){
            var State = History.getState();
            if ($.isEmptyObject(State.data) !== true) { //Important
                $.ajax({
                    url: State.url,
                    // data: State.data,
                    success: function( data ) {
                        if (data.count == 0) {
                            $('#catalog_wrapper').append(data.result);
                        } else {
                            $('#catalog_wrapper').html(data.result);
                            siteperso.filterSearchInit();
                        }
                        // _gaq.push(['_trackPageview', location.pathname + location.search  + location.hash]);
                    },
                    cache: false //Très important
                });
            }
        });
    }

    };

}();
