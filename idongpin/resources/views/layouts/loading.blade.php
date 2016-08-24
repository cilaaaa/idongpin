<div class="loading"
     style="display:none;position:absolute;top:0;left:0;width:100%;
     height: 100%;background:rgba(255,255,255,0.5);
     z-index: 999;text-align: center">
    <div style="width: 100%;height: 100%;position: relative">
        <img src="{{url('/images/loading.gif')}}"
             style="width:50px;height:50px;display: block;
             position: absolute;margin-left: 50%;
             left: -50px;top:50%;margin-top: -50px;"/>
    </div>
</div>
<script type="text/javascript">
    function showLoading(){
        $(".loading").show();
    }
    function hideLoading(){
        $(".loading").hide();
    }
</script>