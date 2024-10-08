<?php


class HipcardIntegration
{
    protected string $apiKey;
    protected string $apiSecret;
    protected string $apiUrl = 'https://www.hipopotamya.com/api/sandbox/v1/hipocard/epins';
    protected string $epinCode;
    protected string $epinSecret;
    protected string $playerName;
    protected string $usedIp;

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function setApiSecret(string $apiSecret): void
    {
        $this->apiSecret = $apiSecret;
    }

    public function setEpinCode(string $epinCode): void
    {
        $this->epinCode = $epinCode;
    }

    public function setEpinSecret(string $epinSecret): void
    {
        $this->epinSecret = $epinSecret;
    }

    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }

    public function setUsedIp(string $usedIp): void
    {
        $this->usedIp = $usedIp;
    }

    public function checkEpinStatus()
    {
        $data = [
            'epin_code' => $this->epinCode,
            'epin_secret' => $this->epinSecret,
            'player_name' => $this->playerName,
            'used_ip' => $this->usedIp,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'api-key: '.$this->apiKey,
            'api-secret: '.$this->apiSecret,
        ]);

        $result = @curl_exec($ch);

        curl_close($ch);

        return json_decode($result , true);
    }
}
