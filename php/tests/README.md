# ReflectionWrapper

通常の `Reflection` によるコード

```php
class ExampleTest extends TestCase
{
    /**
     * Test example.
     */
    public function testExample(): void
    {
        $testClass = new TestClass();
        $reflection = new \ReflectionClass(get_class($testClass));

        // private/protected なメソッドを実行
        $method = $reflection->getMethod('doPrivate');
        $method->setAccessible(true);
        $method->invoke($testClass);

        // private/protected なプロパティへアクセス
        $property = $reflection->getProperty('privateProperty');
        $property->setAccessible(true);
        $property->setValue($testClass, 'private');
    }
}
```

`ReflectionWrapper` を使用したコード

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
