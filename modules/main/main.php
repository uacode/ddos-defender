<?php

/**
 * Description of main
 *
 * @author dobs
 */
class Main {

    function __construct($conf) {
        $this->LANG = $conf['LANG'];

        if (!$_SESSION['login']) {
            $modul = 'auth';
            $LANG  = core::LoadLang($modul, $conf['lang']);

            require APP . '/modules/' . $modul . '/main.php';
            $conf = array('LANG' => $LANG, 'lang' => $this->lang);
            $mod   = ucfirst($modul);
            new $mod($conf);
        } else {

            // temp
            exec('cat /proc/cpuinfo 2>&1', $array_buffer);
            $cpu = implode("\r\n", $array_buffer);
            unset($array_buffer);

            preg_match('/model name	: (.*?)GHz/i', $cpu, $proc); // CPU
            $processor = $proc [1] . 'GHz';

            preg_match('/cache size	: (.*?)(KB|MB)/i', $cpu, $cache); // Cache
//            $this->smarty->assign('cache', $cache [1] . ' ' . $cache [2]);

            preg_match_all('/processor	: ([0-9]+)/i', $cpu, $core); // Count CPU
//            $this->smarty->assign('core', count($core [0]));
            // uptime
            $uptime = file_get_contents('/proc/uptime');
            $uptime = reset(explode(' ', $uptime));

            // la
            $la = file_get_contents('/proc/loadavg');
            list($la_1, $la_10, $la_15) = explode(' ', $la);

            // ram info
            $ram       = file_get_contents('/proc/meminfo');
            $ram       = str_replace(PHP_EOL, '', $ram);
            preg_match('/MemTotal:\s+(.*)\s*kB/i', $ram, $mem);
            $total_ram = $mem[1] * 1024;

            preg_match('/MemFree:\s+(.*)\s*kB/i', $ram, $mem);
            $total_free_ram = $mem[1] * 1024;

            preg_match('/Cached:\s+(.*)\s*kB/i', $ram, $mem);
            $total_cached_ram = $mem[1] * 1024;

            preg_match('/Buffers:\s+(.*)\s*kB/i', $ram, $mem);
            $total_buffers_ram = $mem[1] * 1024;

            // DF
            exec('df -h 2>&1', $fs);

            echo '<h1>sys info</h1>
                <h4>CPU:</h4>
                ' . $processor . '<br />
                <b>cores:</b> ' . count($core [0]) . '<br />
                <b>cache:</b> ' . $cache [1] . ' ' . $cache [2] . '<br />
                ----<br />
                <h4>Memory:</h4>
                Total: ' . fSize($total_ram) . '<br />
                Free: ' . fSize($total_free_ram) . '<br />
                Cached: ' . fSize($total_cached_ram) . '<br />
                Buffers: ' . fSize($total_buffers_ram) . '<br />
                ----<br />
                Uptime: ' . $this->_getUptime() . '<br />
                LA: ' . $la_1 . ', ' . $la_10 . ', ' . $la_15 . '<br />
                ----<br />
                <h1>PHP daemon</h1>
                Run from: ' . exec('whoami') . '<br />
                PHP v.: ' . phpversion() . '<br />
                ----<br />
                <h4>Filesystem:</h4>
                ' . implode('<br />', $fs) . '

                ';
        }
    }

    private function _getUptime() {
        // (c) http://it-ride.blogspot.com/2009/08/php-server-uptime.html

        $file = @fopen('/proc/uptime', 'r');
        if (!$file)
            return 'Opening of /proc/uptime failed!';
        $data = @fread($file, 128);
        if ($data === false)
            return 'fread() failed on /proc/uptime!';

        $uptime = '';

        if ($t = floor($data / 60 / 60 / 24))
            $uptime .= $t . ' days ';

        if ($t = ($data / 60 / 60 % 24))
            $uptime .= $t . ' hours ';

        if ($t = ($data / 60 % 60))
            $uptime .= $t . ' minutes ';

        if ($t = ($data % 60))
            $uptime .= $t . ' seconds';

        return trim($uptime);
    }

}

?>
