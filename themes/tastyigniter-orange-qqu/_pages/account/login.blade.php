---
title: 'main::lang.account.login.title'
layout: default
permalink: /login
'[session]': null
security: guest
'[account]': null
'[socialite]':
    alias: '[socialite]'
    errorPage: account/login
    successPage: account/account
description: ''
---
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto my-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title h4 mb-4 font-weight-normal">
                        @lang('main::lang.account.login.text_login')
                    </h1>

                    @partial('account::login')
                  <hr>
                  <center><p>Or Login with</p><p class="log_l">
					@foreach($socialiteLinks as $name => $link)
						<a href="{{ $link }}"><i class="fab fa-2x fa-{{ $name }}"></i></a>
					@endforeach
                  </p></center>
                  <hr>
                    <div class="row">
                        <div class="col-md-5 p-sm-0">
                            <a class="btn btn-link btn-lg" href="{{ site_url('account/reset') }}">
                                <span class="small">@lang('main::lang.account.login.text_forgot')</span>
                            </a>
                         
                        </div>
                      
                        @if ((bool)$canRegister)
                            <div class="col-sm-7">
                                <a
                                    class="btn btn-outline-default btn-block btn-lg"
                                    href="{{ site_url('account/register') }}"
                                >@lang('main::lang.account.login.button_register')</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>