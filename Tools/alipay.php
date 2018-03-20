<?php
	$aop = new AopClient;
	$aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
	$aop->appId = "2016080800192557";
	$aop->rsaPrivateKey = 'MIIEowIBAAKCAQEA3/M3LW83Azmu/gCXhDdV6YknWlv2B46OKA8+1zEFgl3gy8XLt4eFShz4LzbSV6/nrbhSK+QulsbBnoMZXza4HZCb5zLzIpNnEujWBjsSYNhWO6GIvnH/9ljf6TzA2OQcY65vGjbaNPcUYXGDKh4ofs99HmgPWTelUoiLRB+WYfvndtHGQXvtNJ8wMcKEpWCobcHOx+4KYNjHjvJ3Fp0JU0E1qLSdXor1jPtvL3ImbVf4YGZuTRhY6d2VXlJHaEkAwUkaBBj3UcpU9rvoUgC6aaSlCz0cXTmO9IZwBrlHg74u7l5QSHPzsvzW6Z3jMcNpp94j3HvQn3knxU1N6yiWowIDAQABAoIBAG15sp52QHlGKIIofej3N/s6vc8RJ1sYV+vDUB/X6e6Jv8s9PNHR4NmTAcvqy7Zr2iB0+05TdGbmcF3xjmSaFjT1rRC/OlXLotZ+lalkFR7cgoMR+wvGJK8jUQnuVgNwt2QPMGarK846fm8IE2tyZK9g9LP5gI9HgXywHQxHOLdah/R5oIzUwaJVOemwOsyx45fOWnRWoHcGz7sUKzF+AttvRyjdb5E1yB/AZ3N7xKg5xIAqqTE/XcS3nm3pvvagd6T/+LXHdCoIF8DJ3v22sqnnPdvkp6JLzZqdVpUy1CLzZu7VKuBCFUH6zx1feOZkCT/YaweeDwJ07gpyWvmL0lkCgYEA8q15CRuaX+fydFICYtHA29NF9arndFO7H3kBRQkzOchKmGnJ4pYVkNxVZqjWb0fYHMYN4PXCOoNz9SLVPuUF0gX7vNB/wCqgBmbOGpi7SpTs8fR77K2MKZqRKhLiRme7z06HGyIV15UsCmI2o+OKAV69HMBw8uppYSWfzGEz4fUCgYEA7D6M6xdX6lXROcj933Kw11p8eCPVTPp+wyKj6imH+yUUfrQ1YkOkLz5aPUQHCcdruzV6LKNAjTMDT6AVK5rteLLJgLsAKS5nIFQhCsjQ1SgujEz3xFa4fvFFh+dpM1tpYiO8P8Yw7xaJFs9AZN8Ih9/D9+cgffU2QWH+cOkw/zcCgYEAkRk5wkFX1zonFHeoZ4+Eoas8LDxIcZxSyOmf4bgzgbwJJgIyrKESOfATu/L9a8HoLKQazkQDIttQLOTr3dQv27iqIOYFTE/wKIO1fd+ONHTBC5Yjtoq5wHJjk2WBF5mUiMoqLAYAS0ss7vR0OR+md1U++37wyb1wzp4hYqFH1TUCgYAUeKsfaAtvO/aAamFNbpPSZX3przk5jW9Um3jWvriQ07q97AHAPRpKGb4aFv4BI+268DxhB9h9I9GCod2TxL4VOnDpncq6xtGa5I9kbthh0DSQZc8GjXk5TtD2oN/l2mL8ZRpX8GWnIi3I8zaiRw1nMMW7gqS3JXuJGOPChwJ+6wKBgFevfN/XNohSMj/xWeq7rDzm+8W4Oy3bD81xltIYczVPryJ/af1cX7B3yhzKlJxS8lPD1z/enL8WdJuak/UF0LRPFlVEFo+dMdN1eXmIDkODmwjkdnvMB2/fB5vw6lbgnPBuz50XXlxIHoqXREGs1HtQhhAtRTsshjSnQbmUb729';
	$aop->format = "json";
	$aop->charset = "UTF-8";
	$aop->signType = "RSA2";
	$aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3/M3LW83Azmu/gCXhDdV6YknWlv2B46OKA8+1zEFgl3gy8XLt4eFShz4LzbSV6/nrbhSK+QulsbBnoMZXza4HZCb5zLzIpNnEujWBjsSYNhWO6GIvnH/9ljf6TzA2OQcY65vGjbaNPcUYXGDKh4ofs99HmgPWTelUoiLRB+WYfvndtHGQXvtNJ8wMcKEpWCobcHOx+4KYNjHjvJ3Fp0JU0E1qLSdXor1jPtvL3ImbVf4YGZuTRhY6d2VXlJHaEkAwUkaBBj3UcpU9rvoUgC6aaSlCz0cXTmO9IZwBrlHg74u7l5QSHPzsvzW6Z3jMcNpp94j3HvQn3knxU1N6yiWowIDAQAB';
	$request = new AlipayTradeAppPayRequest();
	$bizcontent = "{\"body\":\"���ǲ������\"," 
	                . "\"subject\": \"App֧������\","
	                . "\"out_trade_no\": \"20170125test01\","
	                . "\"timeout_express\": \"30m\"," 
	                . "\"total_amount\": \"0.01\","
	                . "\"product_code\":\"QUICK_MSECURITY_PAY\""
	                . "}";
	$request->setNotifyUrl("http://zgxnjz.cn");
	$request->setBizContent($bizcontent);
	$response = $aop->sdkExecute($request);
	echo htmlspecialchars($response);


