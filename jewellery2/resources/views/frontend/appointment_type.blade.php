@extends('frontend.layout')
@section('main')
<style>
.stl{
  background: #1f0b00;
    color: white;
    border: none;
    outline: 0 !important;
    height: 44px;
    max-width: 148px;
    width: 100%;
    margin-top: 0.75rem;
}
.dstl{
  border: 1px solid #f5f0ec;
padding: 30px;
box-shadow: -1px 0px 5px 0px #210113;
border-radius: 12px;
background: rgb(245 240 236);
}
</style>
<div class="paddingfromtop">
  <div class="container" style="background: rgb(245 240 236)">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card p-4">
          <p><strong>Virtual Personal Shopping Experience</strong></p>
          <p>20 minutes</p>
        </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
        <form action="<?=base_path?>booking_appointment" method="post" enctype="multipart/form-data" id="sectionForm">
          <div class="form-group">
            <label for="ControlInput1">Time Zone</label>
            <p>(GMT+5:30) India Standard Time</p>
            <!-- <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"> -->
          </div>
  <div class="form-group">
    <label for="datetime-local"></label>
  <?
  date_default_timezone_set("Asia/Calcutta");
          $cur_date=date("Y-m-d");
          $cur_time=date("H:i");
$min = $cur_date."T".$cur_time;
          ?>
    <input type="datetime-local" class="form-control" id="datetime-local" min="<?=$min?>" required name="time">
  </div>
  <h4>Your Intro</h4>
  <hr />
  <div class="form-group">
    <label for="appointname">Name <span style="color:red">*</span></label>
    <div class="d-flex">
      <input type="text" class="form-control" name="f_name" id="appointname" placeholder="First Name" required>
      <input type="text" class="form-control" name="l_name" id="" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="appointphone">Phone <span style="color:red">*</span></label>
      <input type="text" class="form-control" name="phone" id="appointphone" placeholder="" onkeypress="return isNumberKey(event)" minlength="10" maxlength="10" required>
  </div>
  <div class="form-group">
    <label for="appointemail">Email <span style="color:red">*</span></label>
      <input type="email" class="form-control" name="email" id="appointemail" placeholder="" required>
  </div>
  <div class="mt-2 mb-2">
    <label>What are you hoping to get out of your appointment? <span style="color:red">*</span></label>
    <?
    $i=1;
    foreach ($Subcategories as $sub) {

    ?>
    <div class="form-check hoping">
      <input class="form-check-input" type="checkbox" id="appointhopeCheckbox<?=$i?>" value="<?=$sub->id?>" name="subcategory[]">
      <label class="form-check-label ml-5" for="appointhopeCheckbox<?=$i?>"><?=$sub->name?></label>
    </div>
    <?$i++;}?>
  </div>
  <div class="mt-2 mb-2 finish">
    <label>Which finish(es) do you want to see? <span style="color:red">*</span></label>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="appointfinishCheckbox1" value="Rose_Gold" name="finish[]">
      <label class="form-check-label ml-5" for="appointfinishCheckbox1">Rose Gold</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="appointfinishCheckbox2" value="Gold" name="finish[]">
      <label class="form-check-label ml-5" for="appointfinishCheckbox2">Gold</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="appointfinishCheckbox3" value="Sterling_Silver" name="finish[]">
      <label class="form-check-label ml-5" for="appointfinishCheckbox3">Sterling Silver</label>
    </div>
  </div>
  <div class="form-group">
    <label for="pointtodiscuss">Are there particular pieces that you want to discuss?</label>
    <textarea class="form-control" id="pointtodiscuss" rows="3" name="discuss"></textarea>
  </div>
  <div class="form-group">
    <label for="bookingfromregion">Which region are you booking from? <span style="color:red">*</span></label>
    <select class="form-control" id="bookingfromregion" required name="country">
      <option value="">-----select country-----</option>
      <option value="UK">UK</option>
      <option value="Europe">Europe</option>
      <option value="Hong Kong">Hong Kong</option>
      <option value="Singapore">Singapore</option>
      <option value="North America">North America</option>
      <option value="Middle East">Middle East</option>
      <option value="Other">Other</option>
      <!-- <option>Prefer not say</option> -->
    </select>
  </div>
  <div class="mt-2 mb-2">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="howtoconnect" required>
    <label class="form-check-label ml-5" for="howtoconnect">
      I agree to the term of service
    </label>
</div>
</div>
<div class="w-100 text-center">
<button type="submit" class="p-2 stl">Confirming Appointment</button>
</div>
</form>
      </div>
    </div>
  </div>
</div>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
$(document).ready(function(){
  // alert("hi");
    $("form").submit(function(){
 if ($('.finish input:checkbox').filter(':checked').length < 1){
   $.notify({
            icon: 'fa fa-check',
            title: '',
            message: 'Please Check at least one Check Box of finish'
        },{
            element: 'body',
            position: null,
            type: "danger",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            // '<div class="progress" data-notify="progressbar">' +
            // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            // '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
        // alert("Please Check at least one Check Box of finish");
 return false;
 }
 if ($('.hoping input:checkbox').filter(':checked').length < 1){
   $.notify({
            icon: 'fa fa-check',
            title: '',
            message: 'Please Check at least one Check Box of hoping'
        },{
            element: 'body',
            position: null,
            type: "danger",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            // '<div class="progress" data-notify="progressbar">' +
            // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            // '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
        // alert("Please Check at least one Check Box of finish");
 return false;
 //        alert("Please Check at least one Check Box of hoping");
 // return false;
 }

    });
});
</script>
@endsection
