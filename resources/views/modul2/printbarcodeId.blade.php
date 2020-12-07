<!DOCTYPE html> 
<html> 
<head> 
    <title>Cetak  Barcode</title> 
    <style>
        @page { margin-top:11.338582677px; margin-left:12.4488188976px;}
    </style>
</head> 
<body> 
    <table  width="100%"> 
    <tr> 
    @for ($i = 0; $i < 40; $i++)
       @foreach($barang  as $br) 
       <td align="center"  style="border: 1px solid #ccc; width:146.96062992px; height:47.990551181; padding-bottom: 2.1692913386; padding-top: 2.6692913386; padding-left: 3;"> 
       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
       $br->id_barang, 'C128')}}" height="15" width="100">
      <br>{{$br->id_barang }}<br>{{$br->nama}}
      </td>
      @if ($no++ %5 ==0)
           </tr><tr>
      @endif
     @endforeach
     @endfor
    </tr>
   </tsble>
  </body>
</html>