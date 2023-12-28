@extends('layoutAdmin')
@section('title', '一覧表示 | 管理画面 | 丸井グループ 弔事連絡表')
@section('content')
    <input type="checkbox" id="search-card-toggle" class="check" @if($search == 1) checked @endif>
    <div class="card active" id="search-card">
        <label class="tab z-depth-2" for="search-card-toggle">検索</label>
        <div class="card-content">
            <div class="card-title search-title">
                <label for="search-card-toggle">検索</label>
                <label for="search-card-toggle"><i class="material-icons">close</i></label>
            </div>
            <form action="{{ route('admin.search') }}" method="get">
                @csrf
                @if($error)
                    <div class="row yellow lighten-4 caution">
                        {{ $error }}
                    </div>
                @endif
                <div class="row search-input">
                    <label for="related_employee_no" class="col s1 right-align"><b>社員番号</b></label>
                    <input class="col s2 zen2half" type="text" id="related_employee_no" name="related_employee_no" pattern="[0-9]*" maxlength="7" value="@if(isset($no)){{ $no }}@endif">
                    {{--                    <label for="related_name" class="col s2 right-align"><b>名前</b></label>--}}
                    {{--                    <input class="col s1" type="text" id="related_name" name="related_name" value="@if(isset($name)){{ $name }}@endif">--}}
                    <label for="status" class="col s1 right-align"><b>状態</b></label>
                    <div class="co2 s3 text-xsmall">
                        <select type="text" id="status" name="status">
                            <option value="" selected>すべて</option>
                            <option value="1" @if((int)$status == 1) selected @endif>{{ $statusArray[1] }}</option>
                            <option value="2" @if((int)$status == 2) selected @endif>{{ $statusArray[2] }}</option>
                            <option value="3" @if((int)$status == 3) selected @endif>{{ $statusArray[3] }}</option>
                            <option value="4" @if((int)$status == 4) selected @endif>{{ $statusArray[4] }}</option>
                            <option value="5" @if((int)$status == 5) selected @endif>{{ $statusArray[5] }}</option>
                        </select>
                    </div>
                    <label for="general_affairs_name" class="col s1 center-align"><b>手配<br>担当者社員番号</b></label>
                    <input class="col s2 zen2half" type="text" id="general_affairs_employee_no" name="general_affairs_employee_no" pattern="[0-9]*" maxlength="7" value="@if(isset($soumu)){{ $soumu }}@endif">
                    <div class="center-align col s3">
                        <button type="reset" class="btn col s4 push-s1 white black-text">クリア</button>
                        <button type="submit" class="btn col s5 push-s2">検索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <main class="main container @yield('mainClass')">
    @if(!$error)
        <div class="card">
            <div class="card-content">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>弔事当事者の社員番号</th>
                        <th>弔事当事者</th>
                        <th>ﾊﾟｽﾜｰﾄﾞ</th>
                        <th>社内親族</th>
                          {{-- family --}}
                        <th>状態</th>
                        <th>登録日時</th>
                        <th>完了日時</th>
                        <th>PDF</th>
                        <th>詳細</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lists as $list)
                        <tr>
                            <td>{{ $list['id'] }}</td>
                            <td>{{ $list['related_employee_no'] }}</td>
                            <td>
                                <ruby>{{ $list['related_name'] }}
                                    <rt>{{ $list['related_kana'] }}</rt>
                                </ruby>
                            </td>
                            <td>{{ $list['password'] }}</td>
                            <td> @if($list['inlaws'] && $list['inlaws'] === 1) あり @else なし @endif</td>
                            <td>{{ $statusArray[$list['status']] }}</td>
                            <td>{{ $list['created_at'] }}</td>
                            <td>@if((int)$list['final_confirmation']==1)
                                    {{$list['updated_at']}}
                                @else
                                    -
                                @endif</td>
                            <td>
                                @if((int)$list['final_confirmation']==1)
                                    <a href="{{ route('admin.pdf',['id' => encrypt($list['id']), 'no'=> encrypt($list['related_employee_no']) ]) }}" class="waves-effect waves-light btn" target="_blank">PDF<i class="material-icons right">cloud_download</i></a>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                <a href="{{route('admin.detail',$list['id'])}}" class="waves-effect waves-light btn">詳細</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $lists->links() }}

            </div>
        </div>
    @endif
    </main>
@endsection
