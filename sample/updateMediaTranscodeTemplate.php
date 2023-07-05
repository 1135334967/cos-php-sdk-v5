<?php

require dirname(__FILE__, 2) . '/vendor/autoload.php';

$secretId = "SECRETID"; //替换为用户的 secretId，请登录访问管理控制台进行查看和管理，https://console.cloud.tencent.com/cam/capi
$secretKey = "SECRETKEY"; //替换为用户的 secretKey，请登录访问管理控制台进行查看和管理，https://console.cloud.tencent.com/cam/capi
$region = "ap-beijing"; //替换为用户的 region，已创建桶归属的region可以在控制台查看，https://console.cloud.tencent.com/cos5/bucket
$cosClient = new Qcloud\Cos\Client(
    array(
        'region' => $region,
        'schema' => 'https', //协议头部，默认为http
        'credentials'=> array(
            'secretId'  => $secretId ,
            'secretKey' => $secretKey)));
try {
    // https://cloud.tencent.com/document/product/436/54040 更新转码模板
    $result = $cosClient->updateMediaTranscodeTemplate(array(
        'Bucket' => 'examplebucket-125000000', //存储桶名称，由BucketName-Appid 组成，可以在COS控制台查看 https://console.cloud.tencent.com/cos5/bucket
        'Key' => '', // TemplateId
        'Tag' => 'Transcode',
        'Name' => 'Transcode-Template-Name',
        'Container' => array(
            'Format' => '',
            'ClipConfig' => array(
                'Duration' => '',
            ),
        ),
        'Video' => array(
            'Codec' => '',
            'Width' => '',
            'Height' => '',
            'Fps' => '',
            'Remove' => '',
            'Profile' => '',
            'Bitrate' => '',
            'Crf' => '',
            'Gop' => '',
            'Preset' => '',
            'Bufsize' => '',
            'Maxrate' => '',
            'Pixfmt' => '',
            'LongShortMode' => '',
            'Rotate' => '',
        ),
        'TimeInterval' => array(
            'Start' => '',
            'Duration' => '',
        ),
        'Audio' => array(
            'Codec' => '',
            'Samplerate' => '',
            'Bitrate' => '',
            'Channels' => '',
            'Remove' => '',
            'KeepTwoTracks' => '',
            'SwitchTrack' => '',
            'SampleFormat' => '',
        ),
        'TransConfig' => array(
            'AdjDarMethod' => '',
            'IsCheckReso' => '',
            'ResoAdjMethod' => '',
            'IsCheckVideoBitrate' => '',
            'VideoBitrateAdjMethod' => '',
            'IsCheckAudioBitrate' => '',
            'AudioBitrateAdjMethod' => '',
            'DeleteMetadata' => '',
            'IsHdr2Sdr' => '',
            'HlsEncrypt' => array(
                'IsHlsEncrypt' => '',
                'UriKey' => '',
            ),
        ),
        'AudioMixArray' => array(
            array(
                'AudioSource' => '',
                'MixMode' => '',
                'Replace' => '',
                'EffectConfig' => array(
                    'EnableStartFadein' => '',
                    'StartFadeinTime' => '',
                    'EnableEndFadeout' => '',
                    'EndFadeoutTime' => '',
                    'EnableBgmFade' => '',
                    'BgmFadeTime' => '',
                ),
            ),
            array(
                'AudioSource' => '',
                'MixMode' => '',
                'Replace' => '',
                'EffectConfig' => array(
                    'EnableStartFadein' => '',
                    'StartFadeinTime' => '',
                    'EnableEndFadeout' => '',
                    'EndFadeoutTime' => '',
                    'EnableBgmFade' => '',
                    'BgmFadeTime' => '',
                ),
            ),
        ),
    ));
    // 请求成功
    print_r($result);
} catch (\Exception $e) {
    // 请求失败
    echo($e);
}
