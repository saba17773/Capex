<script type="text/javascript">
  function Comma(Num) { //function to add commas to textboxes
    Num += '';
    Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
    Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
    x = Num.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    return x1 + x2;
  }     
  function bannedKey(evt,str){
    var allowedEng = false;
    var allowedThai = false;
    var allowedNum = true;
    
    var k;
    if (window.event) k = window.event.keyCode;
      else if (evt) k = evt.which;
    if (k>=48 && k<=57) { 
      return allowedNum; 
    }
    
    if ((k>=65 && k<=90) || (k>=97 && k<=122)) { 
      // alert('รับค่าเฉพาะตัวเลขเท่านั้น');
      Swal.fire(
        'The Number',
        'รับค่าเฉพาะตัวเลขเท่านั้น',
        'question'
      )
      return allowedEng; 
    }
    if ((k>=161 && k<=255) || (k>=3585 && k<=3675)) { 
      // alert('รับค่าเฉพาะตัวเลขเท่านั้น');
      Swal.fire(
        'The Number',
        'รับค่าเฉพาะตัวเลขเท่านั้น',
        'question'
      );
      return allowedThai; 
    }
    if (!allowedEng && !allowedThai && allowedNum){
    for(i=0;i<str.length;i++){
      if(str[i]=="."){ 
        if(k!=46){
          return true
        }else{
          return false
        } 
      }
    }
    }
  }
  function check(e, value) {
    //Check Charater
    var unicode = e.charCode ? e.charCode : e.keyCode;
    if (value.indexOf(".") != -1){
      if (unicode == 46){
        Swal.fire(
          'The Number',
          'รับค่าเฉพาะตัวเลขและจำนวนเต็มบวกเท่านั้น',
          'question'
        );
        return false;
      }else{            
        return true;
      }         
    }          
    if (unicode != 8){
      if ((unicode < 48 || unicode > 57) && unicode != 46){
        Swal.fire(
          'The Number',
          'รับค่าเฉพาะตัวเลขและจำนวนเต็มบวกเท่านั้น',
          'question'
        );
        return false;
      }else{           
        return true;
      }
    }
      
  }
  //คีย์เฉพาะตัวเลขเท่านั้น
  function chkNumber(ele)
	{
    var vchar = String.fromCharCode(event.keyCode);
    if ((vchar<'0' || vchar>'9') && (vchar != '.')) 
    return false;
    ele.onKeyPress=vchar;
    
	}
  //ห้ามคลิ๊กขวา
  // document.onmousedown = disableclick;
  // status = "Right Click Disabled";
  // Function disableclick(e)
  // {
  //   if(event.button == 2)
  //   {
  //     alert(status);
  //     return false; 
  //   }
  // }
  //Token Laravel
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });  
</script>
