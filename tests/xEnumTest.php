<?php

	use \PHPUnit\Framework\TestCase;

	use \victorwesterlund\xEnum;

	require_once dirname(__DIR__) . "/src/xEnum.php";

	enum Test: string {
		use xEnum;

		case TEST1 = "test1";
		case TEST2 = "test2";
		case TEST3 = "test3";
	}

	final class xEnumTest extends TestCase {
		const VALUES = [
			"TEST1" => "test1",
			"TEST2" => "test2",
			"TEST3" => "test3"
		];

		public function testFromName(): void {
			$test = Test::TEST1;
			$this->assertSame($test, Test::fromName($test->name));
		}

		public function testTryFromName(): void {
			$test = Test::TEST1;
			$this->assertSame($test, Test::tryFromName($test->name));
		}

		public function testTryFromNameInvalid(): void {
			$this->assertSame(null, Test::tryFromName("INVALID"));
		}

		public function testNames(): void {
			$this->assertSame(array_keys(self::VALUES), Test::names());
		}

		public function testValues(): void {
			$this->assertSame(array_values(self::VALUES), Test::values());
		}
	}