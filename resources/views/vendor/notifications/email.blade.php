@component('mail::message')

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }} 
@else
Haben Sie Fragen? Dann kontaktieren Sie uns gerne. 
@lang('Mit freundlichen Grüßen'),<br>
Ihr Menz Belegportal Team
@endif

<table style="font-size:8pt;border-width:1px medium;border-style:solid none;border-top-color:dimgray;height:132px;font-family:Arial,Tahoma,Geneva,Verdana,sans-serif;width:100%;white-space:nowrap;border-bottom-color:dimgray;padding:3px;border-spacing:0px;margin:10px 0px 20px">
   <tbody>
      <tr>
         <td style="vertical-align:middle;white-space:nowrap">
            <div><strong>Menz Naturbaustoffe GmbH<span>&nbsp;</span><br></strong>Mainzer Straße 155<span>&nbsp;</span><br>65187 Wiesbaden<span>&nbsp;</span></div>
         </td>
         <td style="vertical-align:middle;padding:0px 10px;text-align:right">
            <div><img width="auto" height="57" alt="Menz Naturbaustoffe GmbH" src="https://ci4.googleusercontent.com/proxy/3LtqMiVmYOnDezpBMR3-D5e1ni7kRcbnT_2uVjZpKRAYy7jXsbFJD7Aiko32SDFZC5MleoXpqr_35QPb5gq-5HuvA2i-8q4=s0-d-e1-ft#https://menz-gmbh.de/wp-content/uploads/MenzLogo.png" border="0" style="border-style:none;float:none;margin:0px" class="CToWUd"><a href="https://menz-gmbh.de/" style="border:medium none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://menz-gmbh.de/&amp;source=gmail&amp;ust=1636791008337000&amp;usg=AOvVaw07Aw2CPkpf50DZt-cUX95N"></a></div>
         </td>
      </tr>
      <tr>
         <td colspan="2" style="white-space:nowrap"><a href="https://menz-gmbh.de/" style="text-decoration:none;border:medium none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://menz-gmbh.de/&amp;source=gmail&amp;ust=1636791008337000&amp;usg=AOvVaw07Aw2CPkpf50DZt-cUX95N">www.Menz-GmbH.de</a></td>
      </tr>
      <tr>
         <td colspan="2">
            <table style="font-size:8pt;font-family:Arial,Tahoma,Geneva,Verdana,sans-serif;width:100%;padding:3px 5px 0px 0px;border-spacing:0px">
               <tbody>
                  <tr>
                     <td style="white-space:nowrap;padding:3px 5px 0px 0px">Geschäftsführer:<span>&nbsp;</span></td>
                     <td style="white-space:nowrap;padding:3px 0px 0px">Marco A. Menz<span>&nbsp;</span></td>
                  </tr>
                  <tr>
                     <td style="white-space:nowrap;padding:3px 5px 0px 0px">Handelsregister:<span>&nbsp;</span></td>
                     <td style="white-space:nowrap;padding:3px 0px 0px">Wiesbaden HRB 5853<span>&nbsp;</span></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Wenn Sie Probleme beim Klicken auf die Schaltfläche haben, kopieren Sie die unten stehende URL und fügen Sie sie in Ihren Webbrowser ein \n",
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
