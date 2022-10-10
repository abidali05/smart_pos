@php
	$featured_product_exist = !empty($featured_products) && count($featured_products) > 0;
@endphp
@if($featured_product_exist)
	@include('sale_pos.partials.featured_products')
@endif
<div class="row">

	@if(!empty($brands))
		<div class="@if($featured_product_exist) col-sm-4 @else col-md-6 @endif" id="product_brand_div">
			{!! Form::select('size', $brands, null, ['id' => 'product_brand', 'class' => 'select2', 'name' => null, 'style' => 'width:100% !important']) !!}
		</div>
	@endif

	<!-- used in repair : filter for service/product -->
	<div class="col-md-6 hide" id="product_service_div">
		{!! Form::select('is_enabled_stock', ['' => __('messages.all'), 'product' => __('sale.product'), 'service' => __('lang_v1.service')], null, ['id' => 'is_enabled_stock', 'class' => 'select2', 'name' => null, 'style' => 'width:100% !important']) !!}
	</div>

	@if($featured_product_exist)
		<div class="col-sm-4" id="feature_product_div">
			<button type="button" class="btn btn-primary btn-flat" id="show_featured_products">@lang('lang_v1.featured_products')</button>
		</div>
	@endif
</div>
<br>
<div class="row">
	<input type="hidden" id="suggestion_page" value="1">
	<div class="col-md-12">
		<div class="eq-height-row" id="product_list_body"></div>
	</div>
	<div class="col-md-12 text-center" id="suggestion_page_loader" style="display: none;">
		<i class="fa fa-spinner fa-spin fa-2x"></i>
	</div>
</div>

<div class="row">
    <div class="col-md-12">
        @if(!empty($categories))

            <div class="row mt-4" id="product_category_div">
    		@foreach($categories as $index=>$category)
    		    <div class="col-md-3">
    		        <button  style="width:15rem;margin-top:15px" class="btn btn-{{$colors[$index%count($colors)]}}" type="button" onclick="myFunction({{$category['id']}})" >{{$category['name']}}</button>
    			</div>
    		@endforeach
    		</div>


	    @endif
    </div>
</div>


<script>
    //Show product list.
//    get_product_suggestion_list(
//        $('select#product_category').val(),
//        $('select#product_brand').val(),
//        $('input#location_id').val(),
//        null
//    );
    function myFunction(id) {
        var location_id = $('input#location_id').val();
        if (location_id != '' || location_id != undefined) {
if(id==0){
            get_product_suggestion_list(
                "all",
                $('select#product_brand').val(),
                $('input#location_id').val(),
                null
            );
}else{
            get_product_suggestion_list(
                id,
                $('select#product_brand').val(),
                $('input#location_id').val(),
                null
            );
}
        }
    }
</script>