<?php

namespace pxgamer\YifyTorrents\Modules\Torrents;

use pxgamer\YifyTorrents\Modules\Torrents;
use pxgamer\YifyTorrents\Routing;

class Controller extends Routing\Base
{
    public function search()
    {
        $data = new \stdClass();

        $query = $this->request->query['q'] ?? null;

        $data->torrents = Torrents\Model::search($query);

        $this->smarty->display(
            'torrents/search.tpl',
            [
                'data' => $data
            ]
        );
    }

    public function show()
    {
        $data = new \stdClass();

        $torrent_id = $this->request->args['id'] ?? null;

        $data->torrent = Torrents\Model::byId($torrent_id);

        $this->smarty->display(
            'torrents/show.tpl',
            [
                'data' => $data
            ]
        );
    }
}