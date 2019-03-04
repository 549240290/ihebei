let api_url = '';

switch (process.env.NODE_ENV) {
    case 'development':
        api_url = 'http://wumao.doo/api/admin/';
        break;
    case 'production':
        api_url = 'http://wumao.doo/api/admin/';
        break;
}

export const API = api_url