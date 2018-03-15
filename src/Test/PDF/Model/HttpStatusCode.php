<?php
/**
 *
 *   Copyright (c) 2018 Test.Pdf for Cloud
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

/**
 * HttpStatusCode
 *
 * PHP version 5
 *
 * @category Class
 * @package  Test\PDF
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Test\PDF\Model;

/**
 * HttpStatusCode Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     Test\PDF
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class HttpStatusCode
{
    /**
     * Possible values of this enum
     */
    const _CONTINUE = 100;
    const SWITCHING_PROTOCOLS = 101;
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NON_AUTHORITATIVE_INFORMATION = 203;
    const NO_CONTENT = 204;
    const RESET_CONTENT = 205;
    const PARTIAL_CONTENT = 206;
    const MULTIPLE_CHOICES = 300;
    const AMBIGUOUS = 300;
    const MOVED_PERMANENTLY = 301;
    const MOVED = 301;
    const FOUND = 302;
    const REDIRECT = 302;
    const SEE_OTHER = 303;
    const REDIRECT_METHOD = 303;
    const NOT_MODIFIED = 304;
    const USE_PROXY = 305;
    const UNUSED = 306;
    const TEMPORARY_REDIRECT = 307;
    const REDIRECT_KEEP_VERB = 307;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const PAYMENT_REQUIRED = 402;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const NOT_ACCEPTABLE = 406;
    const PROXY_AUTHENTICATION_REQUIRED = 407;
    const REQUEST_TIMEOUT = 408;
    const CONFLICT = 409;
    const GONE = 410;
    const LENGTH_REQUIRED = 411;
    const PRECONDITION_FAILED = 412;
    const REQUEST_ENTITY_TOO_LARGE = 413;
    const REQUEST_URI_TOO_LONG = 414;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const EXPECTATION_FAILED = 417;
    const UPGRADE_REQUIRED = 426;
    const INTERNAL_SERVER_ERROR = 500;
    const NOT_IMPLEMENTED = 501;
    const BAD_GATEWAY = 502;
    const SERVICE_UNAVAILABLE = 503;
    const GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::_CONTINUE,
            self::SWITCHING_PROTOCOLS,
            self::OK,
            self::CREATED,
            self::ACCEPTED,
            self::NON_AUTHORITATIVE_INFORMATION,
            self::NO_CONTENT,
            self::RESET_CONTENT,
            self::PARTIAL_CONTENT,
            self::MULTIPLE_CHOICES,
            self::AMBIGUOUS,
            self::MOVED_PERMANENTLY,
            self::MOVED,
            self::FOUND,
            self::REDIRECT,
            self::SEE_OTHER,
            self::REDIRECT_METHOD,
            self::NOT_MODIFIED,
            self::USE_PROXY,
            self::UNUSED,
            self::TEMPORARY_REDIRECT,
            self::REDIRECT_KEEP_VERB,
            self::BAD_REQUEST,
            self::UNAUTHORIZED,
            self::PAYMENT_REQUIRED,
            self::FORBIDDEN,
            self::NOT_FOUND,
            self::METHOD_NOT_ALLOWED,
            self::NOT_ACCEPTABLE,
            self::PROXY_AUTHENTICATION_REQUIRED,
            self::REQUEST_TIMEOUT,
            self::CONFLICT,
            self::GONE,
            self::LENGTH_REQUIRED,
            self::PRECONDITION_FAILED,
            self::REQUEST_ENTITY_TOO_LARGE,
            self::REQUEST_URI_TOO_LONG,
            self::UNSUPPORTED_MEDIA_TYPE,
            self::REQUESTED_RANGE_NOT_SATISFIABLE,
            self::EXPECTATION_FAILED,
            self::UPGRADE_REQUIRED,
            self::INTERNAL_SERVER_ERROR,
            self::NOT_IMPLEMENTED,
            self::BAD_GATEWAY,
            self::SERVICE_UNAVAILABLE,
            self::GATEWAY_TIMEOUT,
            self::HTTP_VERSION_NOT_SUPPORTED,
        ];
    }
}


