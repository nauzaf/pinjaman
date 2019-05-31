<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pinjaman</title>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/all.min.css')}}">
	<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</head>
<body style="background: #efefef;">
	<nav class="navbar navbar-light bg-light border-bottom" style="background: #fff; justify-content: center; height: 80px;margin-bottom: 24px; align-items: center;">
	  <a class="navbar-brand" href="{{route('home')}}">Pinjaman simulator</a>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="get" action="{{route('hasil')}}" class="form-inline">
					<div class="form-group mx-sm-0 mb-2" style="margin-right: 24px !important;">
	                	<input type="text" id="1" placeholder="Rp 2,000,000.00" name="pinjaman" class="form-control" id="currency-field" pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?Rp" data-type="currency" value="Rp {{number_format($pinjaman,2,',','.')}}">
	                </div>
	                <input type="submit" name="pinjam" value="Cari" class="btn btn-primary mb-2">
	            </form>
			</div>
		</div>
  		<div class="row">
  			@foreach($hasil as $h)
	  		<div class="col-md-12 border" style="margin: 8px;padding: 16px;border-radius: 8px;background: #fff;">
				<div style="font-size: 20px; margin-left: 15px;margin-top: 8px;">{{$h->name}}<a data-toggle="collapse" href="#collapseExample{{$loop->iteration}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$loop->iteration}}" style="float: right; color: #000;"><span class="fa fa-chevron-down"></span></a></div>
				<div style="height: 1px; width: 100%;background: #efefef;margin-top: 12px;margin-bottom: 8px;"></div>
				<div class="row" style="margin-right: 0px;margin-left: 0px;margin-top: 8px;">
					<div class="col-md-3">
						<div style="margin-bottom: 16px;margin-top: 8px;"><span class="fas fa-clock"></span> 1 Bulan</div>
						<div style="height: 1px; width: 100%;background: #efefef;margin-bottom: 8px;"></div>
						<table>
							<tr>
								<td>Bunga</td>
								<td>Rp {{number_format($h->bulan1->bunga,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Admin</td>
								<td>Rp {{number_format($h->biaya_awal,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>Rp {{number_format($h->bulan1->total,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Angsuran/bulan</td>
								<td>Rp {{number_format($h->bulan1->cicilanPerBulan,2,',','.')}}</td>
							</tr>
						</table>
					</div>
					<div class="col-md-3">
						<div style="margin-bottom: 16px;margin-top: 8px;"><span class="fas fa-clock"></span> 3 Bulan</div>
						<div style="height: 1px; width: 100%;background: #efefef;margin-bottom: 8px;"></div>
						<table>
							<tr>
								<td>Bunga</td>
								<td>Rp {{number_format($h->bulan3->bunga,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Admin</td>
								<td>Rp {{number_format($h->biaya_awal,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>Rp {{number_format($h->bulan3->total,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Angsuran/bulan</td>
								<td>Rp {{number_format($h->bulan3->cicilanPerBulan,2,',','.')}}</td>
							</tr>
						</table>
					</div>
					<div class="col-md-3">
						<div style="margin-bottom: 16px;margin-top: 8px;"> <span class="fas fa-clock"></span> 6 Bulan</div>
						<div style="height: 1px; width: 100%;background: #efefef;margin-bottom: 8px;"></div>
						<table>
							<tr>
								<td>Bunga</td>
								<td>Rp {{number_format($h->bulan6->bunga,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Admin</td>
								<td>Rp {{number_format($h->biaya_awal,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>Rp {{number_format($h->bulan6->total,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Angsuran/bulan</td>
								<td>Rp {{number_format($h->bulan6->cicilanPerBulan,2,',','.')}}</td>
							</tr>
						</table>
					</div>
					<div class="col-md-3">
						<div style="margin-bottom: 16px;margin-top: 8px;"><span class="fas fa-clock"></span> 12 Bulan</div>
						<div style="height: 1px; width: 100%;background: #efefef;margin-bottom: 8px;"></div>
						<table>
							<tr>
								<td>Bunga</td>
								<td>Rp {{number_format($h->bulan12->bunga,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Admin</td>
								<td>Rp {{number_format($h->biaya_awal,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>Rp {{number_format($h->bulan12->total,2,',','.')}}</td>
							</tr>
							<tr>
								<td>Angsuran/bulan</td>
								<td>Rp {{number_format($h->bulan12->cicilanPerBulan,2,',','.')}}</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="collapse row" id="collapseExample{{$loop->iteration}}" style="margin-right: 0px;margin-left: 0px;margin-top: 8px;">
					<div class="col-md-12">
						<div style="height: 1px; width: 100%;background: #efefef;margin-top: 12px;margin-bottom: 8px;"></div>
						<label>Syarat</label>
						<div>{{$h->syarat}}</div>
						<div style="height: 1px; width: 100%;background: #efefef;margin-top: 12px;margin-bottom: 8px;"></div>
						<label>Contoh</label>
						<div>{{$h->contoh}}</div>
					</div>
				</div>
			</div>
			@endforeach
  		</div>
	</div>
	<script type="text/javascript">
		$("input[data-type='currency']").on({
		    keyup: function() {
		      formatCurrency($(this));
		    },
		    blur: function() { 
		      formatCurrency($(this), "blur");
		    }
		});


		function formatNumber(n) {
		  // format number 1000000 to 1,234,567
		  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
		}


		function formatCurrency(input, blur) {
		  // appends $ to value, validates decimal side
		  // and puts cursor back in right position.
		  
		  // get input value
		  var input_val = input.val();
		  
		  // don't validate empty input
		  if (input_val === "") { return; }
		  
		  // original length
		  var original_len = input_val.length;

		  // initial caret position 
		  var caret_pos = input.prop("selectionStart");
		    
		  // check for decimal
		  if (input_val.indexOf(".") >= 0) {

		    // get position of first decimal
		    // this prevents multiple decimals from
		    // being entered
		    var decimal_pos = input_val.indexOf(".");

		    // split number by decimal point
		    var left_side = input_val.substring(0, decimal_pos);
		    var right_side = input_val.substring(decimal_pos);

		    // add commas to left side of number
		    left_side = formatNumber(left_side);

		    // validate right side
		    right_side = formatNumber(right_side);
		    
		    // On blur make sure 2 numbers after decimal
		    if (blur === "blur") {
		      right_side += "00";
		    }
		    
		    // Limit decimal to only 2 digits
		    right_side = right_side.substring(0, 2);

		    // join number by .
		    input_val = "Rp " + left_side + "." + right_side;

		  } else {
		    // no decimal entered
		    // add commas to number
		    // remove all non-digits
		    input_val = formatNumber(input_val);
		    input_val = "Rp " + input_val;
		    
		    // final formatting
		    if (blur === "blur") {
		      input_val += ".00";
		    }
		  }
		  
		  // send updated string to input
		  input.val(input_val);

		  // put caret back in the right position
		  var updated_len = input_val.length;
		  caret_pos = updated_len - original_len + caret_pos;
		  input[0].setSelectionRange(caret_pos, caret_pos);
		}
	</script>
</body>
</html>