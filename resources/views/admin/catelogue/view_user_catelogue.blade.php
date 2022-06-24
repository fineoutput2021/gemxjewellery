@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box">
          <h4 class="page-title">View User Catelogue</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">User Catelogue </a></li>
            <li class="breadcrumb-item active">View User Catelogue </li>
          </ol>

          <div class="state-information d-none d-sm-block">
            <!-- <div class="state-graph">
                    <div id="header-chart-1"></div>
                    <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                    <div id="header-chart-2"></div>
                    <div class="info">Item Sold 1230</div>
                </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="card m-b-20">
            <div class="card-body">

              <!-- show success and error messages -->
              @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </div>
              @endif
              @if (session('status-error'))
              <div class="alert alert-danger" role="alert">
                {{ session('status-error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </div>
              @endif
              <!-- End show success and error messages -->

              <div class="row">
                <div class="col-md-10">
                  <h4 class="mt-0 header-title">View User Catelogue List</h4>
                </div>
                <!-- <div class="col-md-2">  <a class="btn btn-info cticket" href="/add_catelogue_view" role="button" style="margin-left: 20px;"> Add Custom Order</a></div> -->
              </div>
              <hr style="margin-bottom: 50px;background-color: darkgrey;">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table  table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th data-priority="3">Catelogues</th>
                        <th data-priority="3">Business name</th>
                        <th data-priority="3">Contact name</th>
                        <th data-priority="3">Email</th>
                        <th data-priority="3">Phone</th>
                        <th data-priority="3">Country</th>
                        <th data-priority="3">IP</th>
                        <th data-priority="3">Date</th>



                      </tr>
                    </thead>
                    <tbody>

                      <?php
// $a=0;
// if(!empty($teamdetails)){
// foreach($teamdetails as $team){
    // $a++;
?>
                      @if(!empty($catelogue_data))
                      <?php $a=0; ?>
                      @foreach($catelogue_data as $catelogue)
                      <?php $a++;?>
                      <tr>

                        <th>{{$a}}</th>
                        <td>
                          <?php
                                    $catelogues= $catelogue->catelogue_checkbx;
                                    if ($catelogues != "" && $catelogues != null) {
                                        $ser=json_decode($catelogues);


                                        foreach ($ser as $s) {
                                            $sidebar_ser=App\adminmodel\Catelogue::wherenull('deleted_at')->where('id', $s)->first();
                                            if (!empty($sidebar_ser)) {
                                                echo $sidebar_ser->name;
                                                echo ",<br />";
                                            }
                                        }
                                    }

                                            ?>
                        </td>
                        <td>{{ $catelogue->business_name}}</td>

                        <td>{{ $catelogue->contact_name}}</td>

                        <td>{{ $catelogue->email}}</td>

                        @if($catelogue->phone !="" && $catelogue->phone != null)
                        <td>{{ $catelogue->phone}}</td>
                        @else
                        <td> - </td>
                        @endif


                        <td>{{ $catelogue->country}}</td>
                        <td>{{ $catelogue->ip}}</td>



                        <td>

                          <?php
                                        $newdate = new DateTime($catelogue->created_at);
                                        echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                                      ?>
                        </td>

                      </tr>
                      @endforeach
                      @endif
                      <?php
// }
// }
?>

                    </tbody>
                  </table>
                </div>

              </div>

            </div>
          </div>
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div>
    <!-- end page content-->

  </div> <!-- container-fluid -->

</div> <!-- content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // $('#userTable').DataTable({
    // responsive: true,
    // // bSort: true
    // });

    $(document.body).on('click', '.dCnf', function() {
      var i = $(this).attr("mydata");
      console.log(i);

      $("#btns" + i).hide();
      $("#cnfbox" + i).show();

    });

    $(document.body).on('click', '.cans', function() {
      var i = $(this).attr("mydatas");
      console.log(i);

      $("#btns" + i).show();
      $("#cnfbox" + i).hide();
    })

  });
</script>
@endsection
