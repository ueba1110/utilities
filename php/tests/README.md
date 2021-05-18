# ReflectionWrapper

使い方サンプル

```php
class ExampleTest extends TestCase
{
    /**
     * Test example.
     */
    public function testExample(): void
    {
        $testClass = new ReflectionWrapper(
            // テスト対象クラスのインスタンスを渡す
            new TestClass()
        );

        // private/protected なメソッドがそのまま呼び出せる
        $testClass->doPrivate();

        // private/protected なプロパティへもアクセス可能
        $testClass->privateProperty = 'private';
    }
}
```
