@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="py-2 mb-2">
                <div class="nav-scroller py-1 mb-2">
                    <nav class="nav d-flex justify-content-start">
                        <a class="d-inline p-2 bg-primary text-white" href="#">全部形式</a>
                        <a class="p-2 text-muted" href="#">电影</a>
                        <a class="p-2 text-muted" href="#">电视剧</a>
                        <a class="p-2 text-muted" href="#">卡通</a>
                        <a class="p-2 text-muted" href="#">综艺</a>
                        <a class="p-2 text-muted" href="#">纪录片</a>
                        <a class="p-2 text-muted" href="#">短片</a>
                    </nav>
                </div>
                <div class="nav-scroller py-1 mb-2">
                    <nav class="nav d-flex justify-content-start">
                        <a class="d-inline p-2 bg-primary text-white" href="#">全部类型</a>
                        <a class="p-2 text-muted" href="#">剧情</a>
                        <a class="p-2 text-muted" href="#">喜剧</a>
                        <a class="p-2 text-muted" href="#">动作</a>
                        <a class="p-2 text-muted" href="#">爱情</a>
                        <a class="p-2 text-muted" href="#">科幻</a>
                        <a class="p-2 text-muted" href="#">动画</a>
                        <a class="p-2 text-muted" href="#">悬疑</a>
                        <a class="p-2 text-muted" href="#">惊悚</a>
                        <a class="p-2 text-muted" href="#">恐怖</a>
                        <a class="p-2 text-muted" href="#">犯罪</a>
                        <a class="p-2 text-muted" href="#">音乐</a>
                        <a class="p-2 text-muted" href="#">歌舞</a>
                        <a class="p-2 text-muted" href="#">传记</a>
                        <a class="p-2 text-muted" href="#">历史</a>
                        <a class="p-2 text-muted" href="#">战争</a>
                        <a class="p-2 text-muted" href="#">西部</a>
                        <a class="p-2 text-muted" href="#">奇幻</a>
                        <a class="p-2 text-muted" href="#">冒险</a>
                        <a class="p-2 text-muted" href="#">灾难</a>
                        <a class="p-2 text-muted" href="#">武侠</a>
                        <a class="p-2 text-muted" href="#">情色</a>
                    </nav>
                </div>
                <div class="nav-scroller py-1 mb-2">
                    <nav class="nav d-flex justify-content-start">
                        <a class="d-inline p-2 bg-primary text-white" href="#">全部地区</a>
                        <a class="p-2 text-muted" href="#">中国大陆</a>
                        <a class="p-2 text-muted" href="#">美国</a>
                        <a class="p-2 text-muted" href="#">香港</a>
                        <a class="p-2 text-muted" href="#">台湾</a>
                        <a class="p-2 text-muted" href="#">日本</a>
                        <a class="p-2 text-muted" href="#">韩国</a>
                        <a class="p-2 text-muted" href="#">英国</a>
                        <a class="p-2 text-muted" href="#">法国</a>
                        <a class="p-2 text-muted" href="#">德国</a>
                        <a class="p-2 text-muted" href="#">意大利</a>
                        <a class="p-2 text-muted" href="#">西班牙</a>
                        <a class="p-2 text-muted" href="#">印度</a>
                        <a class="p-2 text-muted" href="#">泰国</a>
                        <a class="p-2 text-muted" href="#">俄罗斯</a>
                        <a class="p-2 text-muted" href="#">加拿大</a>
                        <a class="p-2 text-muted" href="#">爱尔兰</a>
                        <a class="p-2 text-muted" href="#">瑞典</a>
                        <a class="p-2 text-muted" href="#">巴西</a>
                        <a class="p-2 text-muted" href="#">丹麦</a>
                    </nav>
                </div>
                <div class="nav-scroller py-1 mb-2">
                    <nav class="nav d-flex justify-content-start">
                        <a class="d-inline p-2 bg-primary text-white" href="#">全部年份</a>
                        @for ($i = 0; $i < 15; $i++)
                            <a class="p-2 text-muted" href="#">{{date("Y") - $i}}年</a>
                        @endfor
                    </nav>
                </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">最高得分
                            <span class="oi oi-sort-descending" title="icon name" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">最近热门
                            <span class="oi oi-fire" title="icon name" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">最新上映
                            <span class="oi oi-video" title="icon name" aria-hidden="true"></span>
                        </a>
                    </li>
                    <div class="form-check form-check-inline ml-3">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">我看过的</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">我没看过</label>
                    </div>
                </ul>
            </div>
            <div class="row">
                @foreach ($movies as $movie)
                    <div class="col-md-3">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 @empty($movie->image)
                                 data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{$movie->title}}"
                                 @endempty
                                 alt="{{$movie->title}}" style="height: 270px; width: 100%; display: block;"
                                 src="{{ $movie->image }}" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text">
                                    <small>{{$movie->title}}</small>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-danger">{{$movie->score}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $movies->links('vendor.pagination.bootstrap-4') }}
    </div>
@endsection
