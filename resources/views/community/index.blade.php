@extends(auth()->user()->hasRole('admin') ? 'admin.layouts.app' : (auth()->user()->hasRole('executive') ? 'executive.layouts.app' : 'member.layouts.app'))
<style>
    .community {
        padding: 20px;
        background: #FFFFFF 0% 0% no-repeat padding-box;
        box-shadow: 0px 0px 10px #00000033;
        border: 1px solid #00000066;
        border-radius: 30px;
        opacity: 1;
    }

    .community img {
        border-radius: 20px;
    }

    .community .user-manage {
        display: flex;
        align-items: center;
    }

    .commment {
        display: flex;
        align-items: flex-end;
    }

    .community .commment .comt {
        display: flex;
        align-items: baseline;
    }

    .community .commment .comt p {
        margin-left: 10px;
        font-size: 20px;
        font-weight: 500;
    }

    .community .commment .comt p span {
        font-size: 14px;
        font-weight: 400;
        position: relative;
        top: 15px;
    }

    .commment .comt img {
        border-radius: 0px;
    }

    .community .commment .comt-time {
        width: 20%;
        float: right;
        text-align: right;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Community</h1>
                <p>Hello {{ auth()->user()->name }}, welcome back</p>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <div class="community">
                                <img width="100%" src="{{ asset('backend/images/gallery/17.png') }}">
                                <div class="user-manage">
                                    <img src="{{ asset('backend/images/account.png') }}">
                                    <h3>John D. Cuong</h3>
                                </div>
                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae luctus enim,
                                        quis sollicitudin dolor. Sed pulvinar ultrices consectetur. Mauris a lorem faucibus,
                                        imperdiet ligula vitae, tempus quam. Morbi vulputate dui non purus accumsan aliquet.
                                    </p>
                                </div>
                                <div class="commment">
                                    <div class="comt">
                                        <img width="3%" src="{{ asset('backend/images/icons/message.svg') }}">
                                        <p>Comment<span>785</span></p>
                                    </div>
                                    <div class="comt-time">
                                        <p>50 min</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
