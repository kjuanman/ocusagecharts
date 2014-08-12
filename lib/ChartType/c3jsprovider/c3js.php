<?php
/**
 * Copyright (c) 2014 - Arno van Rossum <arno@van-rossum.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace OCA\ocUsageCharts\ChartType\c3jsProvider;

use OCA\ocUsageCharts\ChartType\ChartTypeInterface;
use \stdClass as ChartConfig;

/**
 * @author Arno van Rossum <arno@van-rossum.com>
 */
class c3js implements ChartTypeInterface
{
    private $templateName = 'c3js';

    /**
     * @var array
     */
    private $usage;

    /**
     * @var ChartConfig
     */
    private $config;

    /**
     * @param ChartConfig $chartConfig
     */
    public function __construct(ChartConfig $chartConfig)
    {
        $this->config = $chartConfig;
    }

    /**
     * Load the frontend files needed
     */
    public function loadFrontend()
    {
        \OCP\Util::addStyle('ocUsageCharts', 'c3js/c3');
        \OCP\Util::addScript('ocUsageCharts', 'c3js/d3.min');
        \OCP\Util::addScript('ocUsageCharts', 'c3js/c3.min');
    }

    /**
     * @param array $usage
     */
    public function loadChart(array $usage)
    {
        $this->usage = $usage;
    }

    /**
     * @return string
     */
    public function getChartType()
    {
        return $this->config->chartType;
    }

    /**
     * Template name
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }


    public function getId()
    {
        return $this->config->chartId;
    }

    public function getConfig()
    {
        return $this->config;
    }
}