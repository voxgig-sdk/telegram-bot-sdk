
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { TelegramBotSDK } from '..'


describe('exists', async () => {

  test('test-mode', () => {
    const testsdk = TelegramBotSDK.test()
    equal(testsdk instanceof TelegramBotSDK, true,
      'TelegramBotSDK.test() must return a client synchronously')
  })

})
