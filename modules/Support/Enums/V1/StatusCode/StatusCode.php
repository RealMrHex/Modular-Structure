<?php

namespace Modules\Support\Enums\V1\StatusCode;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum StatusCode: int
{
    use CleanEnum;

    case HttpContinue                          = 100;
    case HttpSwitchingProtocols                = 101;
    case HttpProcessing                        = 102;
    case HttpEarlyHints                        = 103;
    case HttpOk                                = 200;
    case HttpCreated                           = 201;
    case HttpAccepted                          = 202;
    case HttpNonAuthoritativeInformation       = 203;
    case HttpNoContent                         = 204;
    case HttpResetContent                      = 205;
    case HttpPartialContent                    = 206;
    case HttpMultiStatus                       = 207;
    case HttpAlreadyReported                   = 208;
    case HttpImUsed                            = 226;
    case HttpMultipleChoices                   = 300;
    case HttpMovedPermanently                  = 301;
    case HttpFound                             = 302;
    case HttpSeeOther                          = 303;
    case HttpNotModified                       = 304;
    case HttpUseProxy                          = 305;
    case HttpReserved                          = 306;
    case HttpTemporaryRedirect                 = 307;
    case HttpPermanentlyRedirect               = 308;
    case HttpBadRequest                        = 400;
    case HttpUnauthorized                      = 401;
    case HttpPaymentRequired                   = 402;
    case HttpForbidden                         = 403;
    case HttpNotFound                          = 404;
    case HttpMethodNotAllowed                  = 405;
    case HttpNotAcceptable                     = 406;
    case HttpProxyAuthenticationRequired       = 407;
    case HttpRequestTimeout                    = 408;
    case HttpConflict                          = 409;
    case HttpGone                              = 410;
    case HttpLengthRequired                    = 411;
    case HttpPreconditionFailed                = 412;
    case HttpRequestEntityTooLarge             = 413;
    case HttpRequestUriTooLong                 = 414;
    case HttpUnsupportedMediaType              = 415;
    case HttpRequestedRangeNotSatisfiable      = 416;
    case HttpExpectationFailed                 = 417;
    case HttpIAmATeapot                        = 418;
    case HttpMisdirectedRequest                = 421;
    case HttpUnprocessableEntity               = 422;
    case HttpLocked                            = 423;
    case HttpFailedDependency                  = 424;
    case HttpTooEarly                          = 425;
    case HttpUpgradeRequired                   = 426;
    case HttpPreconditionRequired              = 428;
    case HttpTooManyRequests                   = 429;
    case HttpRequestHeaderFieldsTooLarge       = 431;
    case HttpUnavailableForLegalReasons        = 451;
    case HttpInternalServerError               = 500;
    case HttpNotImplemented                    = 501;
    case HttpBadGateway                        = 502;
    case HttpServiceUnavailable                = 503;
    case HttpGatewayTimeout                    = 504;
    case HttpVersionNotSupported               = 505;
    case HttpVariantAlsoNegotiatesExperimental = 506;
    case HttpInsufficientStorage               = 507;
    case HttpLoopDetected                      = 508;
    case HttpNotExtended                       = 510;
    case HttpNetworkAuthenticationRequired     = 511;
}
