<?php $__env->startSection('page_heading'); ?>
<?php $__env->startSection('content'); ?>
<!--Modal add -->
<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Show</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="lname">รหัส</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t51" disabled>
                            <label for="name">ชื่อข้อมูล</label>
                            <input type="text" class="form-control txt1" name="lname1" id="t1" disabled>
                            <label for="email">รายละเอียด</label>
                            <input type="text" class="form-control txt1" name="email1" id="t3" disabled>
                            <label for="">ความสัมพันธ์กับระบบสารสนเทศ</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela" disabled disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์กับกระบวนการ</label>
                                <textarea type="text" class="form-control txt1" name="email1" id="rela1" disabled disabled style="height: 90px;"></textarea>
                            <label for="">ความสัมพันธ์กับวิธีการการจัดเก็บ</label>
                            <textarea type="text" class="form-control txt1" name="email1" id="rela2" disabled disabled style="height: 90px;"></textarea>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>

            </div>
        </div>
    </div>
</div>
<?php
$i = 0 ;
$a2 = array();
$a3 = array();
foreach($a as $a1) {
    $a2[$i] = $a1->name;
    $a3[$i] = $a1->data_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$b2 = array();
$b3 = array();
foreach($b as $b1) {
    $b2[$i] = $b1->name;
    $b3[$i] = $b1->data_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$c2 = array();
$c3 = array();
foreach($c as $c1) {
    $c2[$i] = $c1->name;
    $c3[$i] = $c1->data_layer_id;
    $i++;
}?>
<?php
$i = 0 ;
$t2 = array();
$t3 = array();
foreach($t as $t1) {
    $t2[$i] = $t1->name;
    $t3[$i] = $t1->data_layer_id;
    $i++;
}?>
<class="container">
        <div class="form-group"><h1 style="font-size:38px;">ระดับข้อมูล</h1></div>
    <?php if(Session::has('message')): ?>
<div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
<p>
</p><br>
<div class="bs-example" data-example-id="bordered-table">
    <div class="row">
        <div class="col-lg-12">
<div class="panel panel-default" >
    <div class="panel-heading">
       <div class="col-lg-2">ตารางข้อมูล</div><div class="col-lg-8"></div><?php echo e(link_to_route('dat.create','เพิ่มข้อมูล',null,['class'=>'btn btn-success'])); ?>

    </div>
    <!-- /.panel-heading -->
    <div class="panel-body" style="margin-right:20px;">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
                <th>รหัส</th>
                <th>ชื่อข้อมูล</th>
                <th>ประเภทของการเก็บข้องมูล</th>
                <th>หมายเหตุ</th>
                <th>จัดการ</th>
            </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $dats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php $__currentLoopData = $in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($dat->id < 10 ): ?>
                            <td><?php echo e($in1->initial); ?>0<?php echo e($dat->id); ?> </td>
                        <?php else: ?>
                            <td><?php echo e($in1->initial); ?><?php echo e($dat->id); ?> </td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     <td class="col-lg-3"><?php echo e($dat->name); ?>  </td>


                     <td class="col-lg-3">

                         <?php $__currentLoopData = $cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $de): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                             <?php if($dat->id ==$de->id ): ?>
                                 <?php echo e($de->type); ?>

                             <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </td>
                     <td class="col-lg-3"><?php echo e($dat->remark); ?>  </td>


                     <td class="col-lg-3">
                           <?php echo Form::open(array('route'=>['dat.destroy',$dat->id],'method'=>'DELETE')); ?>


                            <button type="button" class="btn btn-default add"  data-toggle="modal" data-target="#Add"data-id="<?php echo e($dat->id); ?>" data-id1="<?php echo e($dat->name); ?>"  data-id2="<?php echo e($dat->type); ?>"   data-id3="<?php echo e($dat->remark); ?>" data-id4="<?php echo e($dat->data); ?>" data-id5="<?php echo e($dat->data_dic); ?>"
                                    <?php $__currentLoopData = $in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    data-id51="<?php echo e($in1->initial); ?>"
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  ><i class="fa fa fa-eye po4" aria-hidden="true"></i></button>
                    <a href="<?php echo e(action('DatController@edit',[$dat->id] )); ?>" class="btn btn-default po5" ><i class="fa fa-pencil-square-o po5" aria-hidden="true"></i></a>
                             <i class="btn btn-default po6" aria-hidden="true"><?php echo Form::button('',['class'=>'fa fa-trash del','type'=>'submit']); ?></i>
                           <?php echo Form::close(); ?>

                         </td>
                 </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
        </table>
         </div>
        </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<h1></h1>
    <script src="<?php echo e(asset('/assets/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {


            // $('#filer_input').filer();

            // alert('655');

            //$('tr').each(function(){
            $('.add').on('click',function(){
                //$('#add').click(function () {
                //alert('add new branch');
                //$('#Add').modal('show');

                $('#rela').val('');
                $('#rela1').val('');
                $('#rela2').val('');
                $('#rela3').val('');
                var id = $(this).attr('data-id');
                var a = <?php echo json_encode($a2); ?>;
                var aid = <?php echo json_encode($a3); ?>;
                var count = [];
                var count1 = [];
                var count2 = [];
                var count3 = [];

                // alert(id);
                var length = aid.length;
                for (var i = 0; i < aid.length; i++) {
                    if (aid[i] == id) {
                        count.push(a[i]);
                        //alert(count[i]);
                        $('#rela').val(count);
                        // document.getElementById("rela").innerHTML = fruits.toString();
                    }
                }
                var b = <?php echo json_encode($b2); ?>;
                var bid = <?php echo json_encode($b3); ?>;
                for (var i = 0; i < bid.length; i++) {
                    if (bid[i] == id) {
                        count1.push(b[i]);
                        //alert(a[i]);
                        $('#rela1').val(count1);
                    }
                }
                var c = <?php echo json_encode($c2); ?>;
                var cid = <?php echo json_encode($c3); ?>;
                for (var i = 0; i < cid.length; i++) {
                    if (cid[i] == id) {
                        count2.push(c[i]);
                        // alert(d[i]);
                        $('#rela2').val(count2);
                    }
                }
                var t = <?php echo json_encode($t2); ?>;
                var tid = <?php echo json_encode($t3); ?>;
                for (var i = 0; i < tid.length; i++) {
                    if (tid[i] == id) {
                        count3.push(t[i]);
                        //  alert(t[i]);
                        $('#rela3').val(count3);
                    }
                }

            });
            //    });


        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>