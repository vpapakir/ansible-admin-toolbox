import { __, sprintf } from "@wordpress/i18n";
import { useState, useEffect } from '@wordpress/element';
import { Icon } from "../../components";
import { Spinner } from '@wordpress/components';
import { toast } from "sonner";

const License = () => {
	const [showPassword, setShowPassword] = useState(false);
	const [licenseKey, setLicenseKey] = useState('');
	const [isAPIJOB, setIsAPIJOB] = useState(false);
	const [savedLicense, setSavedLicense] = useState(false);
	const [licenseStatus, setLicenseStatus] = useState({
		status: "",
		message: ""
	});
	const [isLoading, setisLoading] = useState(false);

	const activateLicense = (e) => {
		setIsAPIJOB(true);
		fetch(
			`${cw_dashboard.ajax_url}?action=cp_control_activate_license&security=${cw_dashboard.LicenseNonce}&cpLicenseKey=${licenseKey}`,
			{
				headers: {
					Accept: 'application/json',
					'Content-Type': 'application/json',
					'X-WP-NONCE': cw_dashboard.LicenseNonce
				},
				method: 'POST',
				body: JSON.stringify({
					security: cw_dashboard.LicenseNonce,
					licenseKey: licenseKey
				}),
			}
		)
			.then((r) => r.json())
			.then((r) => {
				if (r.success) {
					setLicenseKey(r.data.license);
					setLicenseStatus(r.data.status);
					'' != r.data.license ? setSavedLicense(true) : setSavedLicense(false);
					toast.success(__('License activation completed successfully.', 'cookery'))
				} else if (!r.success) {
					'' != r.data.license ? setSavedLicense(true) : setSavedLicense(false);
					setLicenseStatus(r.data.status);
					toast.error(__('Error: License activation failed.', 'cookery'))
				}
				setIsAPIJOB(false);
			})

	}

	const deActivateLicense = () => {
		setIsAPIJOB(true);
		fetch(
			`${cw_dashboard.ajax_url}?action=cp_control_deactivate_license`,
			{
				headers: {
					Accept: 'application/json',
					'Content-Type': 'application/json',
				},
				method: 'POST',
			}
		)
			.then((r) => r.json())
			.then((r) => {
				if (r.success) {
					setLicenseKey(r.data.license);
					setLicenseStatus(r.data.status);
					toast.success(__('License deactivation completed successfully.', 'cookery'))
				}
				setIsAPIJOB(false);
			})
	}

	useEffect(() => {
		setisLoading(true);
		fetch(
			`${cw_dashboard.ajax_url}?action=cp_get_license_status`,
			{
				headers: {
					Accept: 'application/json',
					'Content-Type': 'application/json',
				},
				method: 'POST',
			}
		)
			.then((r) => r.json())
			.then((r) => {
				setLicenseKey(r.data.license)
				setLicenseStatus(r.data.status);
				if ('' !== r.data.license) {
					setSavedLicense(true);
				}
				setisLoading(false);
			})
	}, [savedLicense]);

	const handleShowPassword = () => {
		setShowPassword(!showPassword);
	};

	const handleResetLicense = () => {
		setisLoading(true);
		fetch(
			`${cw_dashboard.ajax_url}?action=cp_reset_license_status`,
			{
				headers: {
					Accept: 'application/json',
					'Content-Type': 'application/json',
				},
				method: 'POST',
			}
		)
			.then((r) => {
				setSavedLicense(false);
				setisLoading(false);
			})
	};

	return (
		<>
			<div className="cw-license-wrapper">
				<h2 className="title">
					{__(`Activate ${cw_dashboard.blog_name} License`, "cookery")}
				</h2>
				<div dangerouslySetInnerHTML={{
					__html: sprintf(
						__("You can find your license key from %1$s your account %2$s on our website. An active license is required to use the theme and receive updates. %3$s If there is an error, please %4$s contact our support %5$s - %6$s How to activate the theme license. %7$s", "cookery"),
						`<a target="_blank" href=${cw_dashboard.account}>`,
						'</a>',
						'<br/>',
						`<a target="_blank" href=${cw_dashboard.support}>`,
						'</a>',
						'<a target="_blank" href="https://blossomthemes.com/active-theme-license/?utm_source=cookery&utm_medium=dashboard&utm_campaign=docs">',
						'</a>'
					)
				}}
					className="description"
				/>
				<div className="license-key">
					<div className="license-status">
						{isLoading ? <Spinner /> : (savedLicense && <p dangerouslySetInnerHTML={{ __html: savedLicense && licenseStatus.message }}></p> || <p dangerouslySetInnerHTML={{__html:licenseStatus.message}}></p>)}
					</div>
					<div className="license-key-wrapper">
						<div className="password-wrapper">
							<form action="get" autoComplete="off" className="licform" onSubmit={e => e.preventDefault()}>
								<input
									autoComplete="false"
									required
									disabled={isAPIJOB || licenseStatus.status === "valid"}
									value={licenseKey}
									type={showPassword ? "text" : "password"}
									onChange={(event) => { setLicenseKey(event.target.value); }}
									placeholder={__("License Key", 'cookery')} />
							</form>
							<button className='show-password' htmlFor="password" disabled={isAPIJOB || licenseStatus.status === "valid"} onClick={handleShowPassword}>
								<Icon icon={showPassword ? 'hidePassowrd' : 'preview'} />
							</button>
						</div>
						<div className="button-wrapper">
							<div className="cw-btn-wrap">
								{
									savedLicense && "valid" === licenseStatus.status &&
									<button onClick={deActivateLicense} type="submit" style={{ background: "#DC143C" }} disabled={isAPIJOB} className={`actbtn deactivate ${isAPIJOB && `cw-btn-loading`} cw-button-btn primary-btn`}>{__("Deactivate License", "cookery")}</button>
								}
								{
									"valid" !== licenseStatus.status &&
									<button disabled={!licenseKey || isAPIJOB} type="submit" onClick={activateLicense} className={`actbtn ${isAPIJOB && `cw-btn-loading`} cw-button-btn primary-btn`}>{__("Activate License", "cookery")}</button>}
								{isAPIJOB &&
									<svg style={{ marginLeft: '10px' }} className='cw-svg' width="15" height="15" viewBox="0 0 100 100">
										<g transform="translate(50,50)">
											<g transform="scale(1)">
												<circle cx="0" cy="0" r="50" fill="#687c93" />
												<circle
													cx="0"
													cy="-26"
													r="12"
													fill="#ffffff"
													transform="rotate(161.634)">
													<animateTransform
														attributeName="transform"
														type="rotate"
														calcMode="linear"
														values="0 0 0;360 0 0"
														keyTimes="0;1"
														dur="1s"
														begin="0s"
														repeatCount="indefinite"
													/>
												</circle>
											</g>
										</g>
									</svg>
								}
							</div>
							{("valid" !== licenseStatus.status && savedLicense) &&
								<div className="reset-license">
									<a href="#" onClick={handleResetLicense} >{__('Reset License', 'cookery')}</a>
								</div>
							}
						</div>
					</div>
				</div>
			</div>
		</>
	)
}

export default License;