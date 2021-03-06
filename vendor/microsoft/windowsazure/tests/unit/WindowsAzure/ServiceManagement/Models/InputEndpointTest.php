<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\ServiceManagement\Models;
use WindowsAzure\ServiceManagement\Models\InputEndpoint;

/**
 * Unit tests for class InputEndpoint
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\ServiceManagement\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.0_2014-01
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class InputEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::setRoleName
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::getRoleName
     */
    public function testSetRoleName()
    {
        // Setup
        $expected = 'rolename';
        $inputendpoint = new InputEndpoint();
        
        // Test
        $inputendpoint->setRoleName($expected);
        
        // Assert
        $this->assertEquals($expected, $inputendpoint->getRoleName());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::setVip
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::getVip
     */
    public function testSetVip()
    {
        // Setup
        $expected = 'vip';
        $inputendpoint = new InputEndpoint();
        
        // Test
        $inputendpoint->setVip($expected);
        
        // Assert
        $this->assertEquals($expected, $inputendpoint->getVip());
    }
    
    /**
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::setPort
     * @covers WindowsAzure\ServiceManagement\Models\InputEndpoint::getPort
     */
    public function testSetPort()
    {
        // Setup
        $expected = 'port';
        $inputendpoint = new InputEndpoint();
        
        // Test
        $inputendpoint->setPort($expected);
        
        // Assert
        $this->assertEquals($expected, $inputendpoint->getPort());
    }
}