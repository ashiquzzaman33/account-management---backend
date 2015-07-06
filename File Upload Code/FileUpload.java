import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.net.URLConnection;

public class FileUpload {
	private static final String CrLf = "\r\n";

	public static void main(String[] args) throws Exception {
		FileUpload.uploadFile("http://localhost/test/upload.php", "/test.jpg");
	}

	public static void uploadFile(String siteUrl, String filePath)
			throws Exception {
		URLConnection conn = null;
		OutputStream os = null;
		InputStream is = null;

		try {
			URL url = new URL(siteUrl);
			conn = url.openConnection();
			conn.setDoOutput(true);
			String postData = "";
			InputStream imgIs = FileUpload.class.getResourceAsStream(filePath);
			byte[] imgData = new byte[imgIs.available()];
			imgIs.read(imgData);

			String message1 = "";
			message1 += "-----------------------------4664151417711" + CrLf;
			message1 += "Content-Disposition: form-data; name=\"fileToUpload\"; filename=\"test.jpg\""
					+ CrLf;
			message1 += "Content-Type: image/jpeg" + CrLf;
			message1 += CrLf;

			// the image is sent between the messages in the multipart message.

			String message2 = "";
			message2 += CrLf + "-----------------------------4664151417711--"
					+ CrLf;

			conn.setRequestProperty("Content-Type",
					"multipart/form-data; boundary=---------------------------4664151417711");
			// might not need to specify the content-length when sending chunked
			// data.
			conn.setRequestProperty("Content-Length", String.valueOf((message1
					.length() + message2.length() + imgData.length)));
			os = conn.getOutputStream();
			os.write(message1.getBytes());

			// SEND THE IMAGE
			int index = 0;
			int size = 1024;
			do {
				if ((index + size) > imgData.length) {
					size = imgData.length - index;
				}
				os.write(imgData, index, size);
				index += size;
			} while (index < imgData.length);

			os.write(message2.getBytes());
			os.flush();
			is = conn.getInputStream();

			char buff = 512;
			int len;
			byte[] data = new byte[buff];
			do {
				len = is.read(data);
				if (len > 0) {
					System.out.println(new String(data, 0, len));
				}
			} while (len > 0);

			System.out.println("DONE");
		} catch (Exception e) {
			throw e;
		} finally {
			os.close();
			is.close();

		}
	}
}