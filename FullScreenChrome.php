<html>
<head>
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript" src="chromeless_35.js"></script>
<script language="javascript">
    function openIT(u,W,H,X,Y,n,b,x,m,r) {
        var cU  ='close.gif'        //gif for close on normal state.
        var cO  ='close.gif'        //gif for close on mouseover.
        var cL  ='clock.gif'        //gif for loading indicator.
        var mU  ='minimize.gif'     //gif for minimize to taskbar on normal state.
        var mO  ='minimize.gif'     //gif for minimize to taskbar on mouseover.
        var xU  ='max.gif'          //gif for maximize normal state.
        var xO  ='max.gif'          //gif for maximize on mouseover.
        var rU  ='restore.gif'      //gif for minimize on normal state.
        var rO  ='restore.gif'      //gif for minimize on mouseover.
        var tH  ='<font face=verdana size=2>Online Examination Portal</font>'   //title for the title bar in html format.
        var tW  ='IGIPESS'   //title for the task bar of Windows.
        var wB  ='#D5D5FF'   //Border color.
        var wBs ='#D5D5FF'   //Border color on window drag.
        var wBG ='#D5D5FF'   //Background of the title bar.
        var wBGs='#D5D5FF'   //Background of the title bar on window drag.
        var wNS ='toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0'  //Html parameters for Netscape.
        var fSO ='scrolling=auto noresize'   //Html parameters for main content frame.
        var brd =b||5;      //Extra border size.
        var max =x||false;  //Maxzimize option (true|false).
        var min =m||false;  //Minimize to taskbar option (true|false).
        var res =r||false;  //Resizable window (true|false).
        var tsz =50;   //Height of title bar.
        var W=screen.width;
        var H=screen.height;
        return chromeless(u,n,W,H,X,Y,cU,cO,cL,mU,mO,xU,xO,rU,rO,tH,tW,wB,wBs,wBG,wBGs,wNS,fSO,brd,max,min,res,tsz)
    }
</script>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-12">
<p style="text-align: center; margin-top: 100px">     <a style="font-size: 25px;" class="btn btn-danger btn-block btn-lg" href="#" onclick="mywin001=openIT('http://10.149.45.1/logic/',1250,900,null,null,'mywin001',5,false,false,false);return false">
    Click to Open Examination Portal
    </a>
</p>        </div></div></div>

</body>
</html>