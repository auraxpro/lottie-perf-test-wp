# GoDaddy WordPress Deployment Guide

## 📋 Overview
This guide will help you deploy your WordPress site with the `lottie-perf-test` custom theme to your GoDaddy Deluxe hosting plan.

---

## ✅ Files to Upload

### **Upload ALL of these:**

1. **WordPress Core Files** (Root directory):
   - All `.php` files in the root (index.php, wp-config.php, wp-load.php, etc.)
   - `license.txt`
   - `readme.html`
   - `wp-admin/` folder (entire folder)
   - `wp-includes/` folder (entire folder)
   - `wp-content/` folder (entire folder)

2. **Your Custom Theme**:
   - `wp-content/themes/lottie-perf-test/` folder (entire folder)
   - **BUT EXCLUDE** `node_modules/` subfolder (see exclusions below)

3. **All WordPress Default Themes** (if you want them):
   - All `twenty*` theme folders in `wp-content/themes/`

4. **Plugins** (if any):
   - `wp-content/plugins/` folder

5. **Uploads** (if any):
   - `wp-content/uploads/` folder (media files, images, etc.)

---

## ❌ Files to EXCLUDE (Do NOT Upload)

1. **Development Files**:
   - `node_modules/` folders (in theme or anywhere)
   - `.git/` folder (if exists)
   - `.gitignore` file
   - `.env` files
   - `.vscode/` or `.idea/` folders

2. **Build/Development Tools**:
   - `package.json` and `package-lock.json` (optional - you can upload but not needed)
   - `vite.config.js` (optional - not needed for production)
   - `build-assets.js` (optional - not needed for production)
   - `advanced-build.js` (optional - not needed for production)

3. **Documentation Files** (optional - not needed for site to work):
   - `README.md`
   - `PERFORMANCE_SUMMARY.md`
   - `SPEED_INDEX_OPTIMIZATION.md`
   - `docs/` folder
   - `temp.html`

4. **System Files**:
   - `.DS_Store` (Mac)
   - `Thumbs.db` (Windows)

---

## 🔧 Pre-Deployment Checklist

### Step 1: Update `wp-config.php`
**⚠️ IMPORTANT:** Before uploading, you MUST update `wp-config.php` with your GoDaddy database credentials.

1. Log into your GoDaddy hosting account
2. Go to **cPanel** or **Hosting Dashboard**
3. Find your **MySQL Database** settings
4. Update these values in `wp-config.php`:
   ```php
   define( 'DB_NAME', 'your_godaddy_database_name' );
   define( 'DB_USER', 'your_godaddy_db_username' );
   define( 'DB_PASSWORD', 'your_godaddy_db_password' );
   define( 'DB_HOST', 'localhost' ); // Usually 'localhost' for GoDaddy
   ```

5. **Generate new security keys**:
   - Visit: https://api.wordpress.org/secret-key/1.1/salt/
   - Copy the generated keys and replace the placeholder keys in `wp-config.php`

### Step 2: Remove Development Headers (Optional but Recommended)
In `wp-content/themes/lottie-perf-test/header.php`, you may want to remove or comment out lines 6-7:
```php
// Remove these lines for production:
header('ngrok-skip-browser-warning: true');
header('User-Agent: Mozilla/5.0...');
```

---

## 📤 Upload Methods

### **Method 1: Using GoDaddy File Manager (Easiest)**
1. Log into GoDaddy hosting account
2. Navigate to **File Manager**
3. Go to your domain's root directory (usually `public_html` or similar)
4. **Delete existing WordPress files** (if any) or backup first
5. Click **Upload** button
6. Select all files and folders (excluding the files listed in "Files to EXCLUDE")
7. Upload in batches if files are large

### **Method 2: Using FTP Client (Recommended for Large Sites)**
1. Download an FTP client (FileZilla, WinSCP, etc.)
2. Get FTP credentials from GoDaddy:
   - Go to **cPanel** → **FTP Accounts**
   - Note: Host, Username, Password, Port (usually 21)
3. Connect to your server
4. Navigate to `public_html` (or your domain's root)
5. Upload all files and folders (excluding exclusions)

### **Method 3: Using ZIP Upload (Fastest)**
1. Create a ZIP file of all files (excluding exclusions)
2. Upload the ZIP via File Manager
3. Extract the ZIP file in File Manager
4. Delete the ZIP file after extraction

---

## 🚀 Step-by-Step Upload Process

### **Phase 1: Prepare Files Locally**
1. ✅ Create a backup of your current site (if exists)
2. ✅ Update `wp-config.php` with GoDaddy database credentials
3. ✅ Remove or exclude `node_modules/` folders
4. ✅ Remove development headers from `header.php` (optional)

### **Phase 2: Upload Files**
1. ✅ Upload WordPress core files first:
   - All root `.php` files
   - `wp-admin/` folder
   - `wp-includes/` folder
   - `wp-content/` folder

2. ✅ Verify file permissions:
   - Folders: `755`
   - Files: `644`
   - `wp-config.php`: `600` (more secure)

### **Phase 3: Database Setup**
1. ✅ Create MySQL database in GoDaddy cPanel (if not exists)
2. ✅ Create database user and assign privileges
3. ✅ Import your database (if you have a backup):
   - Use phpMyAdmin in cPanel
   - Or use WP-CLI if available

### **Phase 4: Final Configuration**
1. ✅ Update site URL in database (if needed):
   - Use phpMyAdmin to update `wp_options` table
   - Or use WordPress admin → Settings → General

2. ✅ Set correct file permissions:
   ```bash
   # Folders
   chmod 755 wp-content/themes/
   chmod 755 wp-content/plugins/
   chmod 755 wp-content/uploads/
   
   # Files
   chmod 644 wp-config.php
   ```

3. ✅ Test your site:
   - Visit your domain
   - Check if theme loads correctly
   - Test admin login

---

## 🔍 Post-Deployment Checklist

- [ ] Site loads without errors
- [ ] Admin login works
- [ ] Custom theme (`lottie-perf-test`) is active
- [ ] All pages load correctly
- [ ] Media files display properly
- [ ] Lottie animations work
- [ ] No console errors in browser
- [ ] Permalinks work (Settings → Permalinks → Save)

---

## 🛠️ Troubleshooting

### **Issue: "Error establishing database connection"**
- ✅ Check `wp-config.php` database credentials
- ✅ Verify database exists in GoDaddy cPanel
- ✅ Check database user has proper permissions

### **Issue: "White screen of death"**
- ✅ Check file permissions
- ✅ Enable WP_DEBUG in `wp-config.php` temporarily:
  ```php
  define( 'WP_DEBUG', true );
  define( 'WP_DEBUG_LOG', true );
  ```
- ✅ Check error logs in cPanel

### **Issue: Theme not appearing**
- ✅ Verify `wp-content/themes/lottie-perf-test/` folder exists
- ✅ Check `style.css` has proper theme header
- ✅ Verify file permissions on theme folder

### **Issue: 404 errors on pages**
- ✅ Go to WordPress Admin → Settings → Permalinks
- ✅ Click "Save Changes" (this regenerates `.htaccess`)

---

## 📝 Quick Reference: File Structure to Upload

```
your-domain-root/
├── index.php
├── wp-config.php (UPDATED with GoDaddy credentials)
├── wp-activate.php
├── wp-blog-header.php
├── wp-comments-post.php
├── wp-cron.php
├── wp-links-opml.php
├── wp-load.php
├── wp-login.php
├── wp-mail.php
├── wp-settings.php
├── wp-signup.php
├── wp-trackback.php
├── xmlrpc.php
├── license.txt
├── readme.html
├── wp-admin/ (entire folder)
├── wp-includes/ (entire folder)
└── wp-content/
    ├── index.php
    ├── themes/
    │   ├── lottie-perf-test/ (EXCLUDE node_modules/)
    │   └── [other themes]
    ├── plugins/
    └── uploads/
```

---

## 💡 Pro Tips

1. **Use FTP for large uploads** - File Manager can timeout on large files
2. **Upload in stages** - Core files first, then themes, then plugins
3. **Keep a backup** - Always backup before making changes
4. **Test locally first** - If possible, test with GoDaddy's staging environment
5. **Check PHP version** - Ensure GoDaddy supports your required PHP version (WordPress recommends PHP 7.4+)

---

## 📞 Need Help?

- GoDaddy Support: https://www.godaddy.com/help
- WordPress Codex: https://codex.wordpress.org/
- File Manager Help: Check GoDaddy's documentation for File Manager usage

---

**Good luck with your deployment! 🚀**

