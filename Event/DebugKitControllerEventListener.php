<?php
class DebugKitControllerEventListener extends BcControllerEventListener {
    // 登録先イベントの定義
    public $events = [
        'initialize',
    ];
    // ユーザーコントローラーにおいてアクションが実行される直前に呼び出される
    public function initialize(CakeEvent $event) {
        // サンプルヘルパーをコントローラーに追加
        $Controller = $event->subject();
        if ($Controller->Components->enabled('BcAuth')) {
            $user = $Controller->BcAuth->user();
            if ($user) {
                $Controller->Toolbar = $Controller->Components->load('DebugKit.Toolbar');
            }
        }
    }
}