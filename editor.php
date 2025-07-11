<div class="row">
    <div class="col colLine">
        <span class="material-icons">settings</span>
    </div>
    <div class="col colLine text-danger">
        <span class="material-icons">settings</span>
    </div>
    <div class="col colLine text-danger">
        <button type="button" class="btn btn-primary">
            <span class="material-icons">settings</span> 설정
        </button>
    </div>
</div>

<script>
    function setCommand(command)
    {
        var editor = document.querySelector("#editor");
        var html = document.querySelector("#html");

        document.execCommand(command);
        html.innerHTML = editor.innerHTML;

    }
</script>

<div class="row">
    <div class="col colLine">
        <button type="button" class="btn btn-gray" onClick="setCommand('bold')">
            <span class="material-icons">format_bold</span>
        </button>
        <button type="button" class="btn btn-gray" onClick="setCommand('underline')">
            <span class="material-icons">format_underline</span>
        </button>
        <button type="button" class="btn btn-gray" onClick="setCommand('italic')">
            <span class="material-icons">format_italic</span>
        </button>
    </div>
</div>
<!--
    WYSIWYG : What You See Is What You Get
-->
<div class="row">
    <div class="col colLine">
        <div id="editor" contenteditable="true" style="width:100%; height:300px; border:1px solid #888888; padding:5px;" class="rounded" >
동해물과 백두산이 마르고 닳도록 하나님이 보우하사 우리나라 만세
        </div>
    </div>
</div>
<!-- 
    display:none;
    display:
-->
<div class="row" style="display:">
    <div class="col colLine">
        <textarea id="html" class="form-control" rows="7"></textarea>
    </div>
</div>

<div class="row">
    <div class="col colLine">

    </div>
</div>