/*!
 * This file is a part of Mibew Messenger.
 *
 * Copyright 2005-2018 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
!function(i,e){i.Views.Visitor=i.Views.CompositeBase.extend({template:e.templates["users/visitor"],childView:i.Views.Control,childViewContainer:".visitor-controls",className:"visitor",modelEvents:{change:"render"},events:{"click .invite-link":"inviteUser","click .geo-link":"showGeoInfo","click .track-control":"showTrack"},inviteUser:function(){if(!this.model.get("invitationInfo")){var e=this.model.id,o=i.Objects.Models.page;i.Popup.open(o.get("inviteLink")+"?visitor="+e,"ImCenter"+e,i.Utils.buildWindowParams(o.get("inviteWindowParams")))}},showTrack:function(){var e=this.model.id,o=i.Objects.Models.page;i.Popup.open(o.get("trackedLink")+"?visitor="+e,"ImTracked"+e,i.Utils.buildWindowParams(o.get("trackedVisitorWindowParams")))},showGeoInfo:function(){var e=this.model.get("userIp");e&&i.Utils.alert(i.Localization.trans("No geolocation data available. We recommend you to install Mibew:GeoIp and Mibew:GoogleMaps plugins."))}})}(Mibew,Handlebars);