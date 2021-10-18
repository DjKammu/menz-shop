$(document).ready(function(){
    $('#nextBtn').on('click',function(e){
        e.preventDefault();
        $('#nextBtn').hide();
        $('#idLoader').addClass('opacityN');
         firstLogin($('#idInput').val());
    })
    
    function firstLogin(id){
  
      $.ajax({
        url : 'first-login/'+id,
        type : "get",
        async: false,
        success : function(res) {
           if(res.msg == 0){
                 setTimeout(() => {
                    $('#idLoader').removeClass('opacityN');
                    $('#idInput').addClass('idInput');
                    $('#psInput').fadeIn();
                    $('#psInput').focus();
                    $('#submitBtn').fadeIn();
                }, 2000);
            }else{
                 setTimeout(() => {
                    $('#idLoader').removeClass('opacityN');
                    $('#idInput').addClass('idInput');
                    $('#alert-success').append('<strong>'+res+'</strong>');
                    $('#alert-success').show();
                    $('#nextBtn').fadeIn();

                }, 2000);
            }
        }, 
        error: function(res) {
            setTimeout(() => {
            $('#idLoader').removeClass('opacityN');
            $('#idInput').addClass('idInput');
            $('#kundennummer-error').append('<strong>'+res.responseJSON+'</strong>');
            $('#kundennummer-error').css('color','#dc3545');
            $('#kundennummer-error').show();
            $('#nextBtn').fadeIn();
          },2000);
        }
     });

      
    }

    $('#idInput').on('input',function(e){
        e.preventDefault();
        $('#kundennummer-error').html('');
        $('#alert-success').html('');
        if($(this).val().length > 0){
            $('#nextBtn').removeAttr('disabled');
            $('#nextBtn').css('border-color','#494949');
            $('#nextBtn').css('color','#494949')
            $('#nextBtn').css('cursor','pointer');
        }else{
            $('#nextBtn').css('border-color','#cccccc');
            $('#nextBtn').css('cursor','text')
            $('#nextBtn').css('color','#cccccc');
            $('#nextBtn').attr('disabled','disabled')
        }

    })
    $('#idInput').on('keypress',function(){
        $('#idInput').removeClass('idInput');
        $('#psInput').fadeOut();
        $('#psInput').val('');
        $('#submitBtn').fadeOut();
        $('#nextBtn').show();

    })
    $('#psInput').on('input',function(e){
        e.preventDefault();
        if($(this).val().length > 0){
            $('#submitBtn').removeAttr('disabled');
            $('#submitBtn').css('border-color','#000000');
            $('#submitBtn').css('color','#000000');
            $('#submitBtn').css('cursor','pointer');
        }else{
            $('#submitBtn').css('border-color','#cccccc');
            $('#submitBtn').css('cursor','text');
            $('#submitBtn').css('color','#cccccc');
            $('#submitBtn').attr('disabled','disabled')
        }
    })
    $('#idInput').on('focus',function(e){
        e.preventDefault();
        $('#psInput').removeClass('focusedInput');
        $(this).addClass('focusedInput');
        $(this).css('margin-bottom','1px');
    })  

    $('#idInput').on('mouseover',function(e){
        e.preventDefault();
        $(this).removeClass('is-invalid');
        $('.invalid-feedback').remove();
    })
    $('#psInput').on('focus',function(e){
        e.preventDefault();
        $(this).addClass('focusedInput');
        $('#idInput').removeClass('focusedInput');
    })
    $('#submitBtn').on('click',function(e){
        $('form').submit();
    });

    
    $('#forgotPassInput').on('input',function(e){
        e.preventDefault();
        if($(this).val().length > 0){
          $('#continueBtn').removeAttr('disabled');
          $('#forgotPassLabel').addClass('forgotfocusedInput');
        }else{
          $('#continueBtn').attr('disabled','disabled')
          $('#forgotPassLabel').removeClass('forgotfocusedInput');
        }
      })
      $('#forgotidInput').on('input',function(e){
        e.preventDefault();
        if($(this).val().length > 0){
          $('#idcontinueBtn').removeAttr('disabled');
          $('#forgotidLabel').addClass('forgotfocusedInput');
        }else{
          $('#idcontinueBtn').attr('disabled','disabled')
          $('#forgotidLabel').removeClass('forgotfocusedInput');
        }
      })

      $('#resetemail').on('input',function(e){
        e.preventDefault();
        if($(this).val().length > 0){
        //   $('#idcontinueBtn').removeAttr('disabled');
          $('#resetemailLabel').addClass('forgotfocusedInput');
        }else{
        //   $('#idcontinueBtn').attr('disabled','disabled')
          $('#resetemailLabel').removeClass('forgotfocusedInput');
        }
      })
      $('#resetpass').on('input',function(e){
        e.preventDefault();
        if($(this).val().length > 0){
        //   $('#idcontinueBtn').removeAttr('disabled');
          $('#resetpassLabel').addClass('forgotfocusedInput');
        }else{
        //   $('#idcontinueBtn').attr('disabled','disabled')
          $('#resetpassLabel').removeClass('forgotfocusedInput');
        }
      })
      $('#resetconfirmpass').on('input',function(e){
        e.preventDefault();
        if($(this).val().length > 0){
          $('#resetBtn').removeAttr('disabled');
          $('#resetconfirmpassLabel').addClass('forgotfocusedInput');
        }else{
          $('#resetBtn').attr('disabled','disabled')
          $('#resetconfirmpassLabel').removeClass('forgotfocusedInput');
        }
      })

       $('#menz-search, #menz-search-mobile').on('click', function(e) {
            e.preventDefault();
            $('.headerSearchBar').removeClass('animate__animated animate__slideOutUp');
            $('.customInputGroup').removeClass('animate__slideOutUp');
            $('.customInputGroup').addClass('animate__slideInRight');
            $('#hideSearchBox').fadeIn();
            $('.headerSearchBar').fadeIn();
            setTimeout(() => {
                $('.developerSearchInput').focus();
            }, 800);
        })
        $('#hideSearchBox, #hideSearchBoxMobile').on('click', function(e) {
            e.preventDefault();
            $('.customInputGroup').removeClass('animate__slideInRight');
            $('.customInputGroup').addClass('animate__slideOutUp');
            $('.headerSearchBar').addClass('animate__animated animate__slideOutUp');

        })

      $('.developerSearchInput').keypress(function (e) {
       var key = e.which;
       let search = $(this).val();
       
       if(key == 13 && !search){
            alert('Enter to search something');
            return;
       }  
       else if(key == 13){
          window.location.href = '/search/?s='+search;
        }
      }); 

       $('#idInput').keypress(function (e) {
       var key = e.which;
       if(key == 13){
            $('#nextBtn').click();
       }
      });  

       $('#psInput').keypress(function (e) {
       var key = e.which;
       if(key == 13){
          $('#submitBtn').click();
       }
      });  

      $('body').on('click','li.nav-item.dropdown',function(){ 
       $('.menz-dropdown-menu').toggle();
      });

      $('body').on('click','button.navbar-toggler.menz-toggler',function(){ 
       $('#navbarNavDropdown').slideToggle();
      });

       var germanLocale = {
         cancelLabel: 'abbrechen',
         applyLabel: 'anwenden',
         monthNames: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
         daysOfWeek: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
         firstDay: 1
        };

       
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const start = (urlParams.get('start')) ? urlParams.get('start') : moment().format("DD.MM.YYYY")
        const end = (urlParams.get('end')) ? urlParams.get('end') : moment().format("DD.MM.YYYY")

         $('input[name="daterange"]').daterangepicker({
          locale:germanLocale,
          opens: 'left'
        });
 

        $('input[name="daterange"]').data('daterangepicker').setStartDate(moment(start,'DD.MM.YYYY').format("MM/DD/YYYY"));
        $('input[name="daterange"]').data('daterangepicker').setEndDate(moment(end,'DD.MM.YYYY').format("MM/DD/YYYY"));

        
         if(urlParams.get('start') && urlParams.get('end')){ 
            $('input[name="daterange"]').val(start + ' - '+ end);
         }else{
           $('input[name="daterange"]').val('Datum wählen');
         }


       $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD.MM.YYYY') + ' - ' + picker.endDate.format('DD.MM.YYYY'));
        let startDate = picker.startDate.format('DD.MM.YYYY');
        let endDate = picker.endDate.format('DD.MM.YYYY');
        var fullUrl = window.location.href;
        let isStart = fullUrl.includes('start') ;
        let isEnd = fullUrl.includes('end') ;
        
        var url = '/';
        if(isStart || isEnd){ 
            fullUrl = replaceUrlParam(fullUrl,'start',startDate);
            fullUrl = replaceUrlParam(fullUrl,'end',endDate);
            url = fullUrl;
        }
        else{
           url = fullUrl+(fullUrl.includes('?')?'&':'?')+'start='+startDate+'&end='+endDate
        }

        window.location.href = url;

       });


       $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('Datum wählen');
      });


})


  function sortOrderBy(orderBy,order){
       
      var fullUrl = window.location.href;
      let isOrderBy = fullUrl.includes('orderby') ;
      let isSort = fullUrl.includes('order') ;
      
      var url = '/';
      if(isOrderBy || isSort){ 
          fullUrl = replaceUrlParam(fullUrl,'orderby',orderBy);
          fullUrl = replaceUrlParam(fullUrl,'order',order);
          url = fullUrl;
      }
      else{
         url = fullUrl+(fullUrl.includes('?')?'&':'?')+'orderby='+orderBy+'&order='+order
      }

       window.location.href = url;

 }


  function replaceUrlParam(url, paramName, paramValue)
    {
        if (paramValue == null) {
            paramValue = '';
        }
        var pattern = new RegExp('\\b('+paramName+'=).*?(&|#|$)');
        if (url.search(pattern)>=0) {
            return url.replace(pattern,'$1' + paramValue + '$2');
        }
        url = url.replace(/[?#]$/,'');
        return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
    }