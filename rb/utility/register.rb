# TelegramBot SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

TelegramBotUtility.registrar = ->(u) {
  u.clean = TelegramBotUtilities::Clean
  u.done = TelegramBotUtilities::Done
  u.make_error = TelegramBotUtilities::MakeError
  u.feature_add = TelegramBotUtilities::FeatureAdd
  u.feature_hook = TelegramBotUtilities::FeatureHook
  u.feature_init = TelegramBotUtilities::FeatureInit
  u.fetcher = TelegramBotUtilities::Fetcher
  u.make_fetch_def = TelegramBotUtilities::MakeFetchDef
  u.make_context = TelegramBotUtilities::MakeContext
  u.make_options = TelegramBotUtilities::MakeOptions
  u.make_request = TelegramBotUtilities::MakeRequest
  u.make_response = TelegramBotUtilities::MakeResponse
  u.make_result = TelegramBotUtilities::MakeResult
  u.make_point = TelegramBotUtilities::MakePoint
  u.make_spec = TelegramBotUtilities::MakeSpec
  u.make_url = TelegramBotUtilities::MakeUrl
  u.param = TelegramBotUtilities::Param
  u.prepare_auth = TelegramBotUtilities::PrepareAuth
  u.prepare_body = TelegramBotUtilities::PrepareBody
  u.prepare_headers = TelegramBotUtilities::PrepareHeaders
  u.prepare_method = TelegramBotUtilities::PrepareMethod
  u.prepare_params = TelegramBotUtilities::PrepareParams
  u.prepare_path = TelegramBotUtilities::PreparePath
  u.prepare_query = TelegramBotUtilities::PrepareQuery
  u.result_basic = TelegramBotUtilities::ResultBasic
  u.result_body = TelegramBotUtilities::ResultBody
  u.result_headers = TelegramBotUtilities::ResultHeaders
  u.transform_request = TelegramBotUtilities::TransformRequest
  u.transform_response = TelegramBotUtilities::TransformResponse
}
