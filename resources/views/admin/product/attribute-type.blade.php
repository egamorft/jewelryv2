<div class="mt-3 border-bottom data-variant pb-3">
   <div class="row m-0">
       <div class="col-lg-3 p-1">
           <input type="text" name="variant[{{$count}}][name]" class="form-control name" placeholder="Attribute type name"
                  required>
       </div>
       <div class="col-lg-3 p-1">
           <button type="button" class="btn btn-success btn-add-attribute form-control"><i class="bi bi-plus-lg"></i> Add attributes
           </button>
       </div>
       <div class="col-lg-3 p-1">
           <button type="button" class="btn btn-primary btn-add-type-attribute form-control"><i class="bi bi-plus-lg"></i>Add attribute type name
           </button>
       </div>
       <div class="col-lg-2 p-1">
           <button type="button" class="btn btn-danger btn-clear-color">
               <i class="bi bi-trash"></i> Xóa
           </button>
       </div>
   </div>
   <div class="list-size">
       <div class="row m-0">
           <div class="col-lg-2 p-1">
               <input type="text" name="variant[{{$count}}][data][0][name]" class="form-control name_attribute"
                      placeholder="Attribute name" required>
           </div>
           <div class="col-lg-2 p-1">
            <input name="variant[{{$count}}][data][0][current_stock]" type="text" class="form-control current_stock format-currency"
                   placeholder="current stock">
        </div>
           {{-- <div class="col-lg-2 p-1">
               <input name="variant[{{$count}}][data][0][cost]" type="text" class="form-control cost format-currency"
                      placeholder="Cost">
           </div> --}}
           <div class="col-lg-2 p-1">
               <input name="variant[{{$count}}][data][0][price]" type="text"
                      class="form-control price format-currency" placeholder="Price">
           </div>
       </div>
   </div>
</div>
