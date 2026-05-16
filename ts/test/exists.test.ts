
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { TelegramBotSDK } from '..'


describe('exists', async () => {

  test('test-mode', async () => {
    const testsdk = await TelegramBotSDK.test()
    equal(null !== testsdk, true)
  })

})
