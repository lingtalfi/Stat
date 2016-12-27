<?php


namespace Stat\Analyzer;


class PerDayAnalyzerUtil
{


    /**
     * Scan the given dir and returns the array of available months in the yyyy-mm format
     */
    public static function getAvailableMonths($dir)
    {
        $ret = [];
        if (file_exists($dir)) {
            $files = scandir($dir);
            foreach ($files as $f) {
                if ('.' !== $f && '..' !== $f) {
                    $file = $dir . "/" . $f;
                    if (is_dir($file)) {
                        $months = scandir($file);
                        foreach ($months as $m) {
                            if ('.' !== $m && '..' !== $m) {
                                $file = $file . "/" . $m;
                                if (is_dir($file)) {
                                    $ret[] = $f . "-" . $m;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $ret;
    }
}