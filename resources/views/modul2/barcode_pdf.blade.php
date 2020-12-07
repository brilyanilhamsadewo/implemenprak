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
 
       @foreach($barang  as $br) 
       <td align="center"  style="border: 1px solid #ccc; width:147.96062992px; height:47.990551181; padding-bottom: 1.9692913386; padding-top: 2.6692913386;"> 
        {{$br->nama}}<br>
       <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(
       $br->id_barang, 'C128')}}" height="15" width="100">
      <br>{{$br->id_barang }}
      </td>
      @if ($no++ %5 ==0)
           </tr><tr>
      @endif
     @endforeach
    </tr>
   </table>
  </body>
</html>