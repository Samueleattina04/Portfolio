<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nuovo messaggio dal portfolio</title>
<style>
  body { margin: 0; padding: 0; background: #f1f5f9; font-family: 'Segoe UI', Arial, sans-serif; }
  .wrap { max-width: 580px; margin: 32px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
  .header { background: #030712; padding: 28px 32px; text-align: center; }
  .header-logo { font-size: 2rem; font-weight: 900; color: #00d4ff; letter-spacing: .15em; font-family: monospace; }
  .header-sub { color: #64748b; font-size: .85rem; margin-top: 4px; }
  .body { padding: 32px; }
  .alert { background: #f0fdf4; border-left: 4px solid #22c55e; border-radius: 6px; padding: 12px 16px; margin-bottom: 24px; color: #15803d; font-size: .9rem; }
  .field { margin-bottom: 20px; }
  .label { font-size: .75rem; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: #94a3b8; margin-bottom: 4px; }
  .value { font-size: 1rem; color: #1e293b; }
  .value a { color: #00d4ff; text-decoration: none; }
  .message-box { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-top: 4px; color: #334155; line-height: 1.6; white-space: pre-wrap; word-break: break-word; }
  .reply-btn { display: inline-block; margin-top: 24px; padding: 12px 28px; background: #00d4ff; color: #030712; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: .95rem; }
  .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 16px 32px; text-align: center; font-size: .78rem; color: #94a3b8; }
</style>
</head>
<body>
<div class="wrap">
  <div class="header">
    <div class="header-logo">SA</div>
    <div class="header-sub">samueleattina.it — Nuovo messaggio dal portfolio</div>
  </div>
  <div class="body">
    <div class="alert">
      Hai ricevuto un nuovo messaggio tramite il form di contatto del tuo portfolio.
    </div>
    <div class="field">
      <div class="label">Nome</div>
      <div class="value">{{ $senderName }}</div>
    </div>
    <div class="field">
      <div class="label">Email</div>
      <div class="value"><a href="mailto:{{ $senderEmail }}">{{ $senderEmail }}</a></div>
    </div>
    <div class="field">
      <div class="label">Oggetto</div>
      <div class="value">{{ $subject }}</div>
    </div>
    <div class="field">
      <div class="label">Messaggio</div>
      <div class="message-box">{{ $body }}</div>
    </div>
    <a href="mailto:{{ $senderEmail }}" class="reply-btn">Rispondi a {{ $senderName }}</a>
  </div>
  <div class="footer">
    &copy; {{ date('Y') }} Samuele Attinà — samueleattina.it
  </div>
</div>
</body>
</html>
