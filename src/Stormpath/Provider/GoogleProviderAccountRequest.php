<?php

namespace Stormpath\Provider;

/*
 * Copyright 2013 Stormpath, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Stormpath\DataStore\DataStore;
use Stormpath\Resource\ProviderData;
use Stormpath\Stormpath;

class GoogleProviderAccountRequest implements ProviderAccountRequest
{
    const PROVIDER_ID   = 'google';
    const CODE          = 'code';
    const ACCESS_TOKEN  = 'accessToken';

    private $options;

    function __construct(array $options = array())
    {
        $this->options = $options;
    }

    /**
     * Loads a given instance of ProviderData with the properties
     * stored internally in the request
     *
     * @param ProviderData $providerData the instance to load with data
     * @return ProviderData the given instance with properties set
     */
    function getProviderData(DataStore $dataStore)
    {
        $providerData = $dataStore->instantiate(Stormpath::GOOGLE_PROVIDER_DATA);

        $providerData->providerId = self::PROVIDER_ID;

        if (isset($this->options[self::CODE]))
        {
            $providerData->code = $this->options[self::CODE];
        }

        if (isset($this->options[self::ACCESS_TOKEN]))
        {
            $providerData->accessToken = $this->options[self::ACCESS_TOKEN];
        }

        return $providerData;
    }
}