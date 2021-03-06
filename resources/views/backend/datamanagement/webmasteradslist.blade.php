@extends("backend.layout.layout")
@section("content")
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">

                <div class="text-c">
                    <form id="frm_admin" action="/backend/today/webmasteradslist" method="post" >
                        {{csrf_field()}}
                        日期：
                        <input type="text" name="stime" value="{{isset($stime)?$stime:date('Y-m-d'),time()}}" id="stime" class="input-text" style="width:100px">
                        &nbsp;
                        <input type="text" class="input-text" style="width:200px" placeholder="输入站长广告位ID" id="webmasteradsid" name="webmasteradsid" value="{{isset($webmasteradsid)?$webmasteradsid:''}}">

                        <button type="submit" class="btn btn-success radius" id="btn_seach" name="btn_seach">
                            <i class="Hui-iconfont">&#xe665;</i> 搜
                        </button>
                    </form>
                </div>

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="50">站长广告位ID</th>
                            <th width="50">站长广告位名称</th>
                            <th width="50">站长ID</th>
                            <th width="50">总请求数</th>
                            <th width="50">实际展示数(PV)</th>
                            <th width="50">展示率</th>
                            <th width="50">实际成交金额</th>
                            <th width="50">计费率</th>
                            <th width="50">点击数</th>
                            <th width="50">点击率</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($webmasterAdsSpaceArray as $space)
                        <tr class="text-c">
                            <td>{{$space['space_id']}}</td>
                            <td>{{$space['name']}}</td>
                            <td>{{$space['webmaster_id']}}</td>
                            <td>{{$space['pv']}}</td>
                            <td>{{$space['view']}}</td>
                            <td>{{$space['pv']!=0?round($space['view']/$space['pv'],6):0}}</td>
                            <td>{{$space['earn']}}</td>
                            <td>?</td>
                            <td>{{$space['click']}}</td>
                            <td>{{$space['pv']!=0?round($space['click']/$space['view'],6):0}}</td>

                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">

                </div>

            </article>
        </div>

        <hr />

    </section>
    <script src="<?php echo asset( "/resources/views/backend/js/laydate/laydate.js") ?>" type="text/javascript"></script>
    <script src="<?php echo asset( "/resources/views/backend/js/baseCheck.js?ver=1.0") ?>" type="text/javascript"></script>

    <script>
        laydate.render({
            elem: '#stime'
        });
        laydate.render({
            elem: '#etime'
        });
    </script>



@endsection