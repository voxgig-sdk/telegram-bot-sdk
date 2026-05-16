<?php
declare(strict_types=1);

// TelegramBot SDK utility registration

require_once __DIR__ . '/../core/UtilityType.php';
require_once __DIR__ . '/Clean.php';
require_once __DIR__ . '/Done.php';
require_once __DIR__ . '/MakeError.php';
require_once __DIR__ . '/FeatureAdd.php';
require_once __DIR__ . '/FeatureHook.php';
require_once __DIR__ . '/FeatureInit.php';
require_once __DIR__ . '/Fetcher.php';
require_once __DIR__ . '/MakeFetchDef.php';
require_once __DIR__ . '/MakeContext.php';
require_once __DIR__ . '/MakeOptions.php';
require_once __DIR__ . '/MakeRequest.php';
require_once __DIR__ . '/MakeResponse.php';
require_once __DIR__ . '/MakeResult.php';
require_once __DIR__ . '/MakePoint.php';
require_once __DIR__ . '/MakeSpec.php';
require_once __DIR__ . '/MakeUrl.php';
require_once __DIR__ . '/Param.php';
require_once __DIR__ . '/PrepareAuth.php';
require_once __DIR__ . '/PrepareBody.php';
require_once __DIR__ . '/PrepareHeaders.php';
require_once __DIR__ . '/PrepareMethod.php';
require_once __DIR__ . '/PrepareParams.php';
require_once __DIR__ . '/PreparePath.php';
require_once __DIR__ . '/PrepareQuery.php';
require_once __DIR__ . '/ResultBasic.php';
require_once __DIR__ . '/ResultBody.php';
require_once __DIR__ . '/ResultHeaders.php';
require_once __DIR__ . '/TransformRequest.php';
require_once __DIR__ . '/TransformResponse.php';

TelegramBotUtility::setRegistrar(function (TelegramBotUtility $u): void {
    $u->clean = [TelegramBotClean::class, 'call'];
    $u->done = [TelegramBotDone::class, 'call'];
    $u->make_error = [TelegramBotMakeError::class, 'call'];
    $u->feature_add = [TelegramBotFeatureAdd::class, 'call'];
    $u->feature_hook = [TelegramBotFeatureHook::class, 'call'];
    $u->feature_init = [TelegramBotFeatureInit::class, 'call'];
    $u->fetcher = [TelegramBotFetcher::class, 'call'];
    $u->make_fetch_def = [TelegramBotMakeFetchDef::class, 'call'];
    $u->make_context = [TelegramBotMakeContext::class, 'call'];
    $u->make_options = [TelegramBotMakeOptions::class, 'call'];
    $u->make_request = [TelegramBotMakeRequest::class, 'call'];
    $u->make_response = [TelegramBotMakeResponse::class, 'call'];
    $u->make_result = [TelegramBotMakeResult::class, 'call'];
    $u->make_point = [TelegramBotMakePoint::class, 'call'];
    $u->make_spec = [TelegramBotMakeSpec::class, 'call'];
    $u->make_url = [TelegramBotMakeUrl::class, 'call'];
    $u->param = [TelegramBotParam::class, 'call'];
    $u->prepare_auth = [TelegramBotPrepareAuth::class, 'call'];
    $u->prepare_body = [TelegramBotPrepareBody::class, 'call'];
    $u->prepare_headers = [TelegramBotPrepareHeaders::class, 'call'];
    $u->prepare_method = [TelegramBotPrepareMethod::class, 'call'];
    $u->prepare_params = [TelegramBotPrepareParams::class, 'call'];
    $u->prepare_path = [TelegramBotPreparePath::class, 'call'];
    $u->prepare_query = [TelegramBotPrepareQuery::class, 'call'];
    $u->result_basic = [TelegramBotResultBasic::class, 'call'];
    $u->result_body = [TelegramBotResultBody::class, 'call'];
    $u->result_headers = [TelegramBotResultHeaders::class, 'call'];
    $u->transform_request = [TelegramBotTransformRequest::class, 'call'];
    $u->transform_response = [TelegramBotTransformResponse::class, 'call'];
});
