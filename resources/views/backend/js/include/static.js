function changestatus_static(status,id) {
    var msg1, msg2 = '';
    if( status == 1 ){
        msg1 = "启用";
        msg2 = "禁用";
    }else{
        msg1 = "禁用";
        msg2 = "启用";
    }

    layer.confirm( "当前状态为【" + msg1 + "】，是否更改为【" + msg2 + "】？", function(){
        $.ajax({
            type:"post",
            url:"/backend/static/changestatus",
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:{'common_set_id':id, 'status':status},
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );

                }else{
                    window.location.reload();
                    layer.msg( data.msg );
                }

            },
            error:function (data) {
                layer.msg(data.msg);
            }
        });
    });
}

function openstatic() {
    var index = layer.open({
        type: 2,
        title: "添加全局属性",
        closeBtn: 0,
        area: ['700px', '400px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/static/addstatic/'
    });
}

function add_static() {
    var name  = $.trim( $('#name').val() );
    var nickname  = $.trim( $('#nickname').val() );
    var value = $.trim( $('#value').val() );
    var status  = $.trim( $('#status').val() );

    if(name == '')
    {
        layer.msg('属性代号不能为空');
        return false;
    }
    if(nickname == '')
    {
        layer.msg('属性介绍不能为空');
        return false;
    }
    if(value == '')
    {
        layer.msg('Value不能为空');
        return false;
    }
    if( $.inArray(status, ['0', '1']) == -1){
        layer.msg("状态异常");
        return false;
    }
    $.ajax({
        type:"post",
        url:"/backend/static/addstatic",
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:$("#form1").serialize(),
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    window.parent.location.reload();
                    window.location.close();
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });


}

function edit_static(set_id) {
    var index = layer.open({
        type: 2,
        title: "修改全局属性",
        closeBtn: 0,
        area: ['700px', '400px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/static/editstatic/'+ set_id
    });
}

function edit_static_handup(set_id) {
    var name  = $.trim( $('#name').val() );
    var nickname  = $.trim( $('#nickname').val() );
    var value = $.trim( $('#value').val() );
    var status  = $.trim( $('#status').val() );

    if(name == '')
    {
        layer.msg('属性代号不能为空');
        return false;
    }
    if(nickname == '')
    {
        layer.msg('属性介绍不能为空');
        return false;
    }
    if(value == '')
    {
        layer.msg('Value不能为空');
        return false;
    }
    if( $.inArray(status, ['0', '1']) == -1){
        layer.msg("状态异常");
        return false;
    }
    $.ajax({
        type:"post",
        url:"/backend/static/editstatic/" + set_id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:$("#form1").serialize(),
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    window.parent.location.reload();
                    window.location.close();
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });

}