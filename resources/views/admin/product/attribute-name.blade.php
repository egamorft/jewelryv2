<div class="row m-0">
   <div class="col-lg-2 p-1">
       <input type="text" name="variant[{{$index}}][data][{{$count}}][name]" required class="form-control name_attribute" placeholder="Attribute name">
   </div>
   <div class="col-lg-2 p-1">
      <input name="variant[{{$index}}][data][{{$count}}][current_stock]" type="text" class="form-control current_stock format-currency" placeholder="Current stock">
  </div>
   <div class="col-lg-2 p-1">
       <input name="variant[{{$index}}][data][{{$count}}][cost]" type="text" class="form-control cost format-currency" placeholder="Cost">
   </div>
   <div class="col-lg-2 p-1">
       <input name="variant[{{$index}}][data][{{$count}}][price]" type="text" class="form-control price format-currency" placeholder="Price">
   </div>
   <div class="col-lg-2 p-1">
       <button type="button" class="btn btn-danger btn-clear-size">
           <i class="bi bi-trash"></i> Xóa</button>
   </div>
</div>
