{{--<!--Seciton Cases 案例-->--}}
<section class="wrapper-module-container section-seo-case-list bg-white">
    <div class="row full block-in">


        {{--<!--header-->--}}
        <div class="module-header-box">
            <div class="module-header-title-row wow fadeInUp" data-wow-delay=".2s">
                <h2 class="">SEO 案例展示</h2>
            </div>
            <div class="module-header-desc-row wow fadeInUp" data-wow-delay=".4s">
                <h4 class="">Seo Cases</h4>
            </div>
        </div>


        {{--<!--body-->--}}
        <section class="module-body-box wow fadeInUp" data-wow-delay=".4s">
            <ul class="list-unstyled clearfix">

                    <li class="rectangle-container">
                        <table>
                            <tbody>

                                <tr class="">
                                    <th class="">关键词</th>
                                    <th class="">企业</th>
                                    <th class="">网址</th>
                                    <th class="">渠道</th>
                                    <th class="">初始排名</th>
                                    <th class="">当前排名</th>
                                    <th class="">快照</th>
                                </tr>


                                @foreach($datas as $v)
                                <tr class="">
                                    <td><b>{{$v->keywords or ''}}</b></td>
                                    <td class="row-ellipsis">{{$v->name or ''}}</td>
                                    <td class="row-ellipsis">{{$v->link_url or ''}}</td>
                                    <td>
                                        @if($v->type == 1) <img src="/mitong/images/pc.png">
                                        @elseif($v->type == 2) <img src="/mitong/images/phone.png">
                                        @endif
                                    </td>
                                    <td>{{ json_decode($v->custom)->previous_rank }}</td>
                                    <td><b class="text-success" style="color: red;">第{{ json_decode($v->custom)->after_rank }}名</b></td>
                                    <td class="snapshoot">
                                        @if($v->type == 1)
                                            <a target="_blank" href="https://www.baidu.com/s?ie=UTF-8&wd={{$v->keywords or ''}}">快照</a>
                                        @elseif($v->type == 2)
                                            <a target="_blank" href="https://m.baidu.com/s?ie=UTF-8&wd={{$v->keywords or ''}}">快照</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </li>

            </ul>
        </section>


        <section class="module-footer-container">
        </section>

    </div>
</section>
