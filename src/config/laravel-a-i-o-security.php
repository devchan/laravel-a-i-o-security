<?php
return [

    // ... all other config values

    'password_expires_days' => env('PASSWORD_EXPIRES_DAYS', 30),

    'https_force' => env('HTTPS_FORCE', false),

    'single-session' => [
        'destroy_event' => null,

        'prune_and_revoke_tokens' => true,
    ],

    'purifier' => [

        'encoding' => 'UTF-8',
        'finalize' => true,
        'cachePath' => storage_path('app/purifier'),
        'cacheFileMode' => 0755,
        'settings' => [
            'default' => [
                'HTML.Doctype' => 'HTML 4.01 Transitional',
                'HTML.Allowed' => 'div,b,strong,i,em,u,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
                'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
                'AutoFormat.AutoParagraph' => true,
                'AutoFormat.RemoveEmpty' => true,
            ],
            'test' => [
                'Attr.EnableID' => 'true',
            ],
            "youtube" => [
                "HTML.SafeIframe" => 'true',
                "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%",
            ],
            'custom_definition' => [
                'id' => 'html5-definitions',
                'rev' => 1,
                'debug' => false,
                'elements' => [
                    // http://developers.whatwg.org/sections.html
                    ['section', 'Block', 'Flow', 'Common'],
                    ['nav', 'Block', 'Flow', 'Common'],
                    ['article', 'Block', 'Flow', 'Common'],
                    ['aside', 'Block', 'Flow', 'Common'],
                    ['header', 'Block', 'Flow', 'Common'],
                    ['footer', 'Block', 'Flow', 'Common'],

                    // Content model actually excludes several tags, not modelled here
                    ['address', 'Block', 'Flow', 'Common'],
                    ['hgroup', 'Block', 'Required: h1 | h2 | h3 | h4 | h5 | h6', 'Common'],

                    // http://developers.whatwg.org/grouping-content.html
                    ['figure', 'Block', 'Optional: (figcaption, Flow) | (Flow, figcaption) | Flow', 'Common'],
                    ['figcaption', 'Inline', 'Flow', 'Common'],

                    // http://developers.whatwg.org/the-video-element.html#the-video-element
                    ['video', 'Block', 'Optional: (source, Flow) | (Flow, source) | Flow', 'Common', [
                        'src' => 'URI',
                        'type' => 'Text',
                        'width' => 'Length',
                        'height' => 'Length',
                        'poster' => 'URI',
                        'preload' => 'Enum#auto,metadata,none',
                        'controls' => 'Bool',
                    ]],
                    ['source', 'Block', 'Flow', 'Common', [
                        'src' => 'URI',
                        'type' => 'Text',
                    ]],

                    // http://developers.whatwg.org/text-level-semantics.html
                    ['s', 'Inline', 'Inline', 'Common'],
                    ['var', 'Inline', 'Inline', 'Common'],
                    ['sub', 'Inline', 'Inline', 'Common'],
                    ['sup', 'Inline', 'Inline', 'Common'],
                    ['mark', 'Inline', 'Inline', 'Common'],
                    ['wbr', 'Inline', 'Empty', 'Core'],

                    // http://developers.whatwg.org/edits.html
                    ['ins', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'CDATA']],
                    ['del', 'Block', 'Flow', 'Common', ['cite' => 'URI', 'datetime' => 'CDATA']],
                ],
                'attributes' => [
                    ['iframe', 'allowfullscreen', 'Bool'],
                    ['table', 'height', 'Text'],
                    ['td', 'border', 'Text'],
                    ['th', 'border', 'Text'],
                    ['tr', 'width', 'Text'],
                    ['tr', 'height', 'Text'],
                    ['tr', 'border', 'Text'],
                ],
            ],
            'custom_attributes' => [
                ['a', 'target', 'Enum#_blank,_self,_target,_top'],
            ],
            'custom_elements' => [
                ['u', 'Inline', 'Inline', 'Common'],
            ],
        ],

    ],

    'secure-headers' => [
        /*
            * Server
            *
            * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Server
            *
            * Note: when server is empty string, it will not add to response header
            */

        'server' => '',

        /*
         * X-Content-Type-Options
         *
         * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Content-Type-Options
         *
         * Available Value: 'nosniff'
         */

        'x-content-type-options' => 'nosniff',

        /*
         * X-Download-Options
         *
         * Reference: https://msdn.microsoft.com/en-us/library/jj542450(v=vs.85).aspx
         *
         * Available Value: 'noopen'
         */

        'x-download-options' => 'noopen',

        /*
         * X-Frame-Options
         *
         * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options
         *
         * Available Value: 'deny', 'sameorigin', 'allow-from <uri>'
         */

        'x-frame-options' => 'sameorigin',

        /*
         * X-Permitted-Cross-Domain-Policies
         *
         * Reference: https://www.adobe.com/devnet/adobe-media-server/articles/cross-domain-xml-for-streaming.html
         *
         * Available Value: 'all', 'none', 'master-only', 'by-content-type', 'by-ftp-filename'
         */

        'x-permitted-cross-domain-policies' => 'none',

        /*
         * X-XSS-Protection
         *
         * Reference: https://blogs.msdn.microsoft.com/ieinternals/2011/01/31/controlling-the-xss-filter
         *
         * Available Value: '1', '0', '1; mode=block'
         */

        'x-xss-protection' => '1; mode=block',

        /*
         * Referrer-Policy
         *
         * Reference: https://w3c.github.io/webappsec-referrer-policy
         *
         * Available Value: 'no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin',
         *                  'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', 'unsafe-url'
         */

        'referrer-policy' => 'no-referrer',

        /*
         * Clear-Site-Data
         *
         * Reference: https://w3c.github.io/webappsec-clear-site-data/
         */

        'clear-site-data' => [
            'enable' => false,

            'all' => false,

            'cache' => true,

            'cookies' => true,

            'storage' => true,

            'executionContexts' => true,
        ],

        /*
         * HTTP Strict Transport Security
         *
         * Reference: https://developer.mozilla.org/en-US/docs/Web/Security/HTTP_strict_transport_security
         *
         * Please ensure your website had set up ssl/tls before enable hsts.
         */

        'hsts' => [
            'enable' => false,

            'max-age' => 15552000,

            'include-sub-domains' => false,
        ],

        /*
         * Expect-CT
         *
         * Reference: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Expect-CT
         */

        'expect-ct' => [
            'enable' => false,

            'max-age' => 2147483648,

            'enforce' => false,

            'report-uri' => null,
        ],

        /*
         * Public Key Pinning
         *
         * Reference: https://developer.mozilla.org/en-US/docs/Web/Security/Public_Key_Pinning
         *
         * hpkp will be ignored if hashes is empty.
         */

        'hpkp' => [
            'hashes' => [
                // 'sha256-hash-value',
            ],

            'include-sub-domains' => false,

            'max-age' => 15552000,

            'report-only' => false,

            'report-uri' => null,
        ],

        /*
         * Feature Policy
         *
         * Reference: https://wicg.github.io/feature-policy/
         */

        'feature-policy' => [
            'enable' => true,

            /*
             * Each directive details can be found on:
             *
             * https://github.com/WICG/feature-policy/blob/master/features.md
             *
             * 'none', '*' and 'self allow' are mutually exclusive,
             * the priority is 'none' > '*' > 'self allow'.
             */

            'camera' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'fullscreen' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'geolocation' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'microphone' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'midi' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'payment' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'picture-in-picture' => [
                'none' => false,

                '*' => true,

                'self' => false,

                'allow' => [
                    // 'url',
                ],
            ],

            'accelerometer' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'ambient-light-sensor' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'gyroscope' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'magnetometer' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'speaker' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'usb' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],

            'vr' => [
                'none' => false,

                '*' => false,

                'self' => true,

                'allow' => [
                    // 'url',
                ],
            ],
        ],

        /*
         * Content Security Policy
         *
         * Reference: https://developer.mozilla.org/en-US/docs/Web/Security/CSP
         *
         * csp will be ignored if custom-csp is not null. To disable csp, set custom-csp to empty string.
         *
         * Note: custom-csp does not support report-only.
         */

        'custom-csp' => null,

        'csp' => [
            'report-only' => false,

            'report-uri' => null,

            'block-all-mixed-content' => false,

            'upgrade-insecure-requests' => false,

            /*
             * Please references script-src directive for available values, only `script-src` and `style-src`
             * supports `add-generated-nonce`.
             *
             * Note: when directive value is empty, it will use `none` for that directive.
             */

            'script-src' => [
                'allow' => [
                    // 'url',
                ],

                'hashes' => [
                    // 'sha256' => [
                    //     'hash-value',
                    // ],
                ],

                'nonces' => [
                    // 'base64-encoded',
                ],

                'schemes' => [
                    // 'https:',
                ],

                'self' => false,

                'unsafe-inline' => false,

                'unsafe-eval' => false,

                'strict-dynamic' => false,

                'unsafe-hashed-attributes' => false,

                'add-generated-nonce' => false,
            ],

            'style-src' => [
                'allow' => [
                    //
                ],

                'hashes' => [
                    // 'sha256' => [
                    //     'hash-value',
                    // ],
                ],

                'nonces' => [
                    //
                ],

                'schemes' => [
                    // 'https:',
                ],

                'self' => false,

                'unsafe-inline' => false,

                'add-generated-nonce' => false,
            ],

            'img-src' => [
                //
            ],

            'default-src' => [
                //
            ],

            'base-uri' => [
                //
            ],

            'connect-src' => [
                //
            ],

            'font-src' => [
                //
            ],

            'form-action' => [
                //
            ],

            'frame-ancestors' => [
                //
            ],

            'frame-src' => [
                //
            ],

            'manifest-src' => [
                //
            ],

            'media-src' => [
                //
            ],

            'object-src' => [
                //
            ],

            'worker-src' => [
                //
            ],

            'plugin-types' => [
                // 'application/x-shockwave-flash',
            ],

            'require-sri-for' => '',

            'sandbox' => '',

        ],
    ],
];